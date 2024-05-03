<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderProductController extends Controller
{
    //
    public function sendorder(Request $request,)
    {
        if (auth()->user()->role == 'user')
        {
            if(session()->has('cart'))
            {
                $cartproducts=session()->get('cart');
                foreach($cartproducts as $carproduct)
                {

                }

            }
        }



    }
    
}
