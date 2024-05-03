<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\PModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SingleProductController extends Controller
{
    public function index(PModel $product)
    {
        // Retrieve comments for the given product
        $comments = $product->comments()->orderByDesc("created_at")->get();

        // Retrieve other products that belong to the same categories
        $relatedProducts = $product->relatedProducts($product->id);

        // Pass the product, comments, and related products to the view
        return view('front.singleproduct', compact('product', 'comments', 'relatedProducts'));
    }

    public function addToCart(Request $request, PModel $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $quantityExect = PModel::findOrFail($product->id)->quantity;

        $cart = session()->get('cart', ["quantity"=>0]);
        if ($quantityExect > ($request->input('quantity')+$cart[$product->id]['quantity'] )|| $quantityExect == $request->input('quantity')+$cart[$product->id]['quantity']) {

            if (isset($cart[$product->id])) {
                $totalquantity = $request->input('quantity') + $cart[$product->id]['quantity'];
            } else {
                $totalquantity = $request->input('quantity');
                $totalprice = $totalquantity * $product->price;
                $cart[$product->id] = [
                    "product_name" => $product->productname,
                    "image" => $product->image,
                    "model_name" => $product->name,
                    "price" => $product->price,
                    "quantity" => $totalquantity,
                    "totalprice" => $totalprice
                ];
            }

            if (isset($cart[$product->id])) {
                $cart[$product->id]['quantity'] = $totalquantity;
                $cart[$product->id]['totalprice'] = $totalquantity * $product->price;
            } else {
                $totalprice = $totalquantity * $product->price;
                $cart[$product->id] = [
                    "product_name" => $product->productname,
                    "image" => $product->image,
                    "model_name" => $product->name,
                    "price" => $product->price,
                    "quantity" => $totalquantity,
                    "totalprice" => $totalprice
                ];
            }
        } else {
            if (isset($cart[$product->id])) {
                $totalquantity = $quantityExect;
            } else {
                $totalquantity = $quantityExect-$cart[$product->id]['quantity'];
                $totalprice = $totalquantity * $product->price;
                $cart[$product->id] = [
                    "product_name" => $product->productname,
                    "image" => $product->image,
                    "model_name" => $product->name,
                    "price" => $product->price,
                    "quantity" => $totalquantity,
                    "totalprice" => $totalprice
                ];
            }

            if (isset($cart[$product->id])) {
                $cart[$product->id]['quantity'] = $totalquantity;
                $cart[$product->id]['totalprice'] = $totalquantity * $product->price;
            } else {
                $totalprice = $totalquantity * $product->price;
                $cart[$product->id] = [
                    "product_name" => $product->productname,
                    "image" => $product->image,
                    "model_name" => $product->name,
                    "price" => $product->price,
                    "quantity" => $totalquantity,
                    "totalprice" => $totalprice
                ];
            }
        }

        session()->put('cart', $cart);
        //        dd($cart);
        return redirect()->back()->with('success', 'Product added successfully to cart.');
    }    public function LeaveComment(Request $request, PModel $product)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'review' => 'required|string',
        ]);


        try {
            $comment = new Comment();
            $comment->name = $request->input('name');
            $comment->email = $request->input('email');
            $comment->content = $request->input('review');
            $comment->product_id = $product->id;

            // Save the comment
            $comment->save();

            // Return the newly created comment data
            return response()->json([
                'success' => true,
                'name' => $comment->name,
                'content' => $comment->content,
                'created_at' => $comment->created_at->format('F j, Y') // Format the created_at date
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e], 500);
        }
    }
}
