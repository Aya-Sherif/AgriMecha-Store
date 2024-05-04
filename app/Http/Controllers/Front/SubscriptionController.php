<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriptions;
use Illuminate\Validation\ValidationException;

class SubscriptionController extends Controller
{
    //
    function add(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email|max:30',
        ]);

        // Check if the email already exists
        $existingSubscription = Subscriptions::where('email', $request->email)->first();

        if ($existingSubscription) {
            // Email already exists, return with an error message
            throw ValidationException::withMessages(['email' => 'This email is already subscribed.']);
        }

        // Email does not exist, create a new subscription
        Subscriptions::create(['email' => $request->email]);

        return back()->with('success', 'Data Sent Successfully');
    }
}
