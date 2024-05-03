<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class RecivedOrderController extends Controller
{
    //


public function index()
{
    $orders = Order::with('user', 'orderDetails')->get();
    return view('admin.orders', compact('orders'));
}

    public function updateorderstat(Request $request, $id)
    {
        // Find the message by ID
        $order = Order::findOrFail($id);

        // Validate the request data if needed
        $request->validate([
            'state' => 'required|in:waited,Done,canceled', // Ensure the state is either 'pending' or 'Done'
        ]);

       // dd($message);
        // Update the state of the message
        $order->state = $request->state;

        // Save the changes
        $order->save();

        //dd($message);

    //dd($request);
    //dd($id);
         return redirect()->back()->with('success', 'Order state updated successfully');
    }
}
