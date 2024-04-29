<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\PModel;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed users
        User::factory(10)->create();
Blog::factory(10)->create();
        // Seed categories
        $categories = Category::factory(5)->create();

        // Seed PModels with associated products and categories
        PModel::factory(10)->create()->each(function ($pModel) use ($categories) {
            // Create products associated with the PModel
            $products = Product::factory(5)->create(['p_model_id' => $pModel->id]);

            // Attach categories to each PModel
            $pModel->category()->associate($categories->random());
            $pModel->save();
        });
    }
}
