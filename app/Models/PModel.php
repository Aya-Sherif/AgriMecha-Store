<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PModel extends Model
{
    use HasFactory;
    protected $fillable=['name','image','pdf_file' ,'description','price','productname','quantity','category_id','additional_data' ];

    public function products()
    {
        return $this->hasMany(Product::class);
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

}
