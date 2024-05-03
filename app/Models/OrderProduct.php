<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function Product()
    {
        return $this->belongsTo(PModel::class);
    }
    protected $fillable = ['totalprice', 'product_id', 'product_name','quantity', 'order_id' ];
}
