<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriptions;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    //
    function index()
    {
        $subs=Subscriptions::all();
        return view("admin.subscriptions",compact('subs'));
    }
  
}
