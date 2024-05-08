<?php

// Include Composer autoloader

// Your PHP code here
// ...

namespace App\Http\Controllers\Front;

use App\Events\CartUpdated;
use App\Http\Controllers\Controller;
use App\Models\PModel;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopCatlogController extends Controller
{
    //
    public function index()
    {
        $models = PModel::all();
        $categories = Category::all();
        $modelCounts = [];

        // Loop through each category
        foreach ($categories as $category) {
            // Retrieve the count of models related to the current category
            $count = PModel::where('category_id', $category->id)->count();

            // Store the count in the modelCounts array with category ID as key
            $modelCounts[$category->id] = $count;
        }
        $maxprice=PModel::max('price');

        return view("front.shopcatalog", compact("models", "categories","modelCounts",'maxprice'));
    }
    public function sortfilter(Request $request)
    {
        // Retrieve the selected sorting option from the form
        $sortingOption = $request->input('sorting_option');

        // Implement sorting logic based on the selected option
        switch ($sortingOption) {
            case '2':
                // Sorting logic for Price low to high
                $models = PModel::orderBy('price', 'asc')->get();
                break;
            case '3':
                // Sorting logic for Price high to low
                $models = PModel::orderBy('price', 'desc')->get();
                break;
            case '4':
                // Sorting logic for Sort by latest
                $models = PModel::orderBy('created_at', 'desc')->get();
                break;
            default:
                // Default sorting logic or no sorting applied
                $models = PModel::all();
                break;
        }
        // Pass sorted models data to the view
        $categories = Category::all();
        $modelCounts = [];

        // Loop through each category
        foreach ($categories as $category) {
            // Retrieve the count of models related to the current category
            $count = PModel::where('category_id', $category->id)->count();

            // Store the count in the modelCounts array with category ID as key
            $modelCounts[$category->id] = $count;
        }

        // Additional data to compact
        $maxprice = PModel::max('price');

        // Compact all data and return the view
        return view("front.shopcatalog", compact("models", "categories", "modelCounts", "maxprice"));
    }

    // public function sortfilter(Request $request)
    // {
    //     // Retrieve the selected sorting option from the form
    //     $sortingOption = $request->input('sorting_option');

    //     // Implement sorting logic based on the selected option
    //     switch ($sortingOption) {
    //         case '2':
    //             // Sorting logic for Price low to high
    //             $models = PModel::orderBy('price', 'asc')->get();
    //             break;
    //         case '3':
    //             // Sorting logic for Price high to low
    //             $models = PModel::orderBy('price', 'desc')->get();
    //             break;
    //         case '4':
    //             // Sorting logic for Sort by latest
    //             $models = PModel::orderBy('created_at', 'desc')->get();
    //             break;
    //         default:
    //             // Default sorting logic or no sorting applied
    //             $models = PModel::all();
    //             break;
    //     }

    //     // Pass sorted models data to the view
    //     return view("front.shopcatalog", compact("models"));
    // }


    public function addToCart($id)
    {
        try {
            // Retrieve the product by ID
            $product = PModel::findOrFail($id);

            // Get the cart from the session or initialize it as an empty array
            $cart = session()->get('cart', []);

            // Increment cart count
            $cartCount = 0;

            // Dispatch CartUpdated event
            CartUpdated::dispatch($cartCount);

            // Check if the product already exists in the cart



            if (isset($cart[$id])) {
                // If so, increment the quantity
                if ($product->quantity > $cart[$id]['quantity']) {

                    $cart[$id]['quantity']++;
                    $cart[$product->id]['totalprice'] = $product->price * $cart[$id]['quantity'];
                } else {
                    return response()->json(['message' => "There is no enough data"]);
                }
            } else {
                // If not, add the product to the cart
                $cart[$id] = [
                    "product_name" => $product->productname,
                    "image" => $product->image,
                    "model_name" => $product->name,
                    "price" => $product->price,
                    "quantity" => 1,
                    "totalprice" => $product->price
                ];
            }

            // Update cart count
            foreach ($cart as $item) {
                $cartCount += $item['quantity'];
            }

            // Dispatch CartUpdated event
            CartUpdated::dispatch($cartCount);

            // Update cart in session
            session()->put('cart', $cart);

            // Return JSON response
            return response()->json(['message' => 'Product Added Successfully']);
        } catch (\Exception $e) {
            // Handle any exceptions
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function categoryfilter($id)
    {

        $models = PModel::where('category_id', $id)->get();

        $categories = Category::all();
        $modelCounts = [];

        // Loop through each category
        foreach ($categories as $category) {
            // Retrieve the count of models related to the current category
            $count = PModel::where('category_id', $category->id)->count();

            // Store the count in the modelCounts array with category ID as key
            $modelCounts[$category->id] = $count;
        }
        $maxprice=PModel::max('price');

        return view("front.shopcatalog", compact("models", "categories","modelCounts",'maxprice'));
    }
    public function pricefilter(Request $request)
    {
        // Retrieve models within the price range
        $models = PModel::whereBetween('price', [$request->min_value, $request->max_value])->get();

        // Retrieve all categories
        $categories = Category::all();

        // Initialize an array to store model counts for each category
        $modelCounts = [];

        // Loop through each category to count models
        foreach ($categories as $category) {
            // Retrieve the count of models related to the current category
            $count = PModel::where('category_id', $category->id)->count();

            // Store the count in the modelCounts array with category ID as key
            $modelCounts[$category->id] = $count;
        }
        $maxprice=PModel::max('price');

        // Pass data to the view
        return view("front.shopcatalog", compact("models", "categories", "modelCounts","maxprice"));
    }


}
