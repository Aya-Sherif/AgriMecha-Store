<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\PModel;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    function index(Cart $cartModel)
    {
        $cart = session()->get('cart', []); // Retrieve cart data from session
        $total = $cartModel->calculateTotal($cart); // Calculate total using model method
        return view('front.cart',compact('total')); // Pass cart data and total to the view
    }
    public function showCart(Cart $cartModel)
    {
        $cart = session()->get('cart', []); // Retrieve cart data from session
        $total = $cartModel->calculateTotal($cart); // Calculate total using model method
        return redirect()->route('front.cart')->with('total', $total); // Pass cart data and total to the view
    }

    public function addToCart(Request $request, $productId)
{
    $quantityRequested = $request->input('quantity');
    $product = PModel::findOrFail($productId);
    $quantityInStock = $product->quantity;

    // Initialize the cart
    $cart = session()->get('cart', []);

    // Check if the requested quantity exceeds the available stock
    if ($quantityInStock >= $quantityRequested) {
        // Check if the product exists in the cart
        if (isset($cart[$productId])) {
            // Update the quantity and total price in the cart
            $cart[$productId]['quantity'] = $quantityRequested;
            $cart[$productId]['totalprice'] = $quantityRequested * $product->price;
        } else {
            // Add the product to the cart
            $cart[$productId] = [
                'product_name' => $product->productname,
                'image' => $product->image,
                'model_name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantityRequested,
                'totalprice' => $quantityRequested * $product->price
            ];
        }
    } else {
        // Update the cart with the exact quantity available in stock
        if (isset($cart[$productId])) {
            // Update the quantity and total price in the cart
            $cart[$productId]['quantity'] = $quantityInStock;
            $cart[$productId]['totalprice'] = $quantityInStock * $product->price;
        } else {
            // Add the product to the cart with the available quantity
            $cart[$productId] = [
                'product_name' => $product->productname,
                'image' => $product->image,
                'model_name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantityInStock,
                'totalprice' => $quantityInStock * $product->price
            ];
        }
    }

    // Store the updated cart in the session
    session()->put('cart', $cart);

    return response()->json(['success' => true]);
}


    public function removeFromCart($productId,Cart $cartModel)
    {
        // Check if the product exists in the cart
        if (session()->has('cart')) {
            $cart = session()->get('cart');
            // Check if the product to remove exists in the cart
            if (isset($cart[$productId])) {
                // Remove the product from the cart
                unset($cart[$productId]);

                // Update the session cart
                session()->put('cart', $cart);
                // Retrieve cart data from session

                $total = $cartModel->calculateTotal($cart); // Calculate total using model method

                return view("front.cart",compact('total'))->with('success', "Success");
            } else {
                $total = $cartModel->calculateTotal($cart);
                return view("front.cart",compact('total'))->with('error', "Error!!!");
            }


        }
    }
}
