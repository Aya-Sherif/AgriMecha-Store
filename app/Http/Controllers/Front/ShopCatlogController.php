<?php

// Include Composer autoloader

// Your PHP code here
// ...

namespace App\Http\Controllers\Front;

use App\Events\CartUpdated;
use App\Http\Controllers\Controller;
use App\Models\PModel;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopCatlogController extends Controller
{
    //
    public function index()
    {
        $models = PModel::all();
        $categories = Category::all();
        return view("front.shopcatalog", compact("models", "categories"));
    }

    public function addToCart($id)
    {
        try {
            // Retrieve the product by ID
            $product = PModel::findOrFail($id);

            // Get the cart from the session or initialize it as an empty array
            $cart = session()->get('cart', []);

            // Increment cart count
            $cartCount = 0;

            // Dispatch CartUpdated event
            CartUpdated::dispatch($cartCount);

            // Check if the product already exists in the cart



            if (isset($cart[$id])) {
                // If so, increment the quantity
                if ($product->quantity > $cart[$id]['quantity']) {

                    $cart[$id]['quantity']++;
                    $cart[$product->id]['totalprice'] = $product->price * $cart[$id]['quantity'];
                }
                else{
                    return response()->json(['message' =>"There is no enough data"]);
                }
            } else {
                // If not, add the product to the cart
                $cart[$id] = [
                    "product_name" => $product->productname,
                    "image" => $product->image,
                    "model_name" => $product->name,
                    "price" => $product->price,
                    "quantity" => 1,
                    "totalprice" => $product->price
                ];
            }

            // Update cart count
            foreach ($cart as $item) {
                $cartCount += $item['quantity'];
            }

            // Dispatch CartUpdated event
            CartUpdated::dispatch($cartCount);

            // Update cart in session
            session()->put('cart', $cart);

            // Return JSON response
            return response()->json(['message' => 'Product Added Successfully']);
        } catch (\Exception $e) {
            // Handle any exceptions
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
