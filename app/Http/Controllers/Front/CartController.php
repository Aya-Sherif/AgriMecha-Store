<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
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
        $quantity = $request->input('quantity');
        // Check if the product is already in the cart
        if (session()->has('cart')) {
            $cart = session()->get('cart');
            // Check if the product exists in the cart
            if (isset($cart[$productId])) {
                $product = $cart[$productId]; // Define $product here
                $cart[$productId]['quantity'] = $quantity;
                $cart[$productId]['totalprice'] = $quantity * $product['price'];
            } else {
                // If the product doesn't exist, you need to fetch it from somewhere
                // Assuming $product is fetched from your database or some other source

            }
        } else {
            // Initialize the cart and add the product

        }

        // Store the updated cart in the session
        session()->put('cart', $cart);

        return response()->json(['success' =>  true]);
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
                $cart = session()->get('cart', []); // Retrieve cart data from session
                $total = $cartModel->calculateTotal($cart); // Calculate total using model method

                return view("front.cart",compact('total'))->with('success', "Success");
            } else {

                return view("front.cart")->with('error', "Error!!!");
            }
        }
    }
}
