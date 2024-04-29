<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public function calculateTotal($cart)
    {
        $total = 0;
        foreach ($cart as $cartproduct) {
            if(isset($cartproduct))
            {

                $total += $cartproduct['totalprice'];
            }
            else{
                continue;
            }

        }
        return $total;
    }
}
