<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\PModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class OrderController extends Controller
{

    function index()
    {
        $user = Auth::id(); // Get authenticated user ID
        $orders = Order::where('user_id', $user)->with('orderDetails.product')->get();

        return view("front.userorders", compact('orders'));
    }
    public function checkout(Request $request,)
    {
        if (auth()->user() == null) {
            return redirect()->route('login');
        } elseif (auth()->user()->role == 'user') {
            if (session()->has('cart')) {
                $order = Order::create([
                    'user_id' => auth()->user()->id // Assuming user is authenticated
                    // Add other order details such as total amount, status, etc.
                ]);
                foreach (session('cart') as $key => $cartProduct) {
                    $product = PModel::findOrFail($key);
                    if ($product->quantity > $cartProduct['quantity'] || $product->quantity == $cartProduct['quantity']) {
                        $product->quantity -= $cartProduct['quantity'];
                        $product->save();

                        OrderProduct::create([
                            'order_id' => $order->id,
                            'product_id' => $key,
                            'product_name' => $cartProduct['product_name'],
                            'quantity' => $cartProduct['quantity'],
                            'totalprice' => $cartProduct['totalprice'],

                            // Add other product details such as price, name, etc.
                        ]);
                    }
                }
            }
        } elseif (auth()->user()->role == 'admin') {
            return redirect()->route('front.cart');
        }

        session()->forget('cart');

        return redirect()->route('front.cart');
        //   return redirect()->route('order.confirmation', ['order' => $order->id]);

    }


    // Clear the cart session

    // Redirect to the order confirmation page

    public function cancelorder(Request $request, string $id)
    {


        // Find the category by its ID
        $Order = Order::findOrFail($id);
        $state = 'canceled';
        $products = OrderProduct::where('order_id',$id)->get();

        foreach ($products as $product) {
        //    dd($product);

            $productInStock = PModel::findOrFail($product->product_id);
            $totalquantity = $productInStock->quantity + $product->quantity;
            // dd($totalquantity);

            $productInStock->quantity = ($totalquantity);
            $productInStock->save();
        }
        // Update the category with the validated data
        $Order->state = ($state);
        $Order->save();

        return back()->with('success', __("admin.updated"));
    }
}
