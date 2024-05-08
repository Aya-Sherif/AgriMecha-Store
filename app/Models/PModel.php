<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PModel extends Model
{
    use HasFactory;
    protected $fillable=['name','image','pdf_file' ,'description','price','productname','quantity','category_id','additional_data' ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function OrderProduct()
    {
        return $this->hasMany(OrderProduct::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'product_id');
    }
    public function relatedProducts($id)
    {
        // Get the category ID of the current product model
        $currentProductCategory = PModel::findOrFail($id)->category_id;

        // Retrieve other products that belong to the same category
        $relatedProducts = PModel::where('category_id', $currentProductCategory)
            ->where('id', '!=', $id)
            ->take(3)
            ->get();

        return $relatedProducts;
    }
    public static function getBestSellerProducts()
{
    // Join order_products, orders, and p_model tables to get total quantity and product names
    $bestSellers = DB::table('order_products')
        ->join('orders', 'order_products.order_id', '=', 'orders.id')
        ->join('p_models', 'order_products.product_id', '=', 'p_models.id')
        ->select('p_models.productname', 'order_products.product_id', DB::raw('SUM(order_products.quantity) as total_quantity'))
        ->groupBy('order_products.product_id', 'p_models.productname')
        ->orderByDesc('total_quantity')
        ->limit(5)
        ->get();

    return $bestSellers;
}

}
