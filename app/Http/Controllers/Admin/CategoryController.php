<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view("admin.categories.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                "name" => "required|string|min:3"
            ]
        );
        Category::create($data);
        return back()->with('success', __("admin.added"));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
        //
    }

    /**
     * Update the specified resource in storage.
     */

public function update(Request $request, string $id)
{
    $data = $request->validate([
        "name" => "required|string|min:3"
    ]);

    // Find the category by its ID
    $category = Category::findOrFail($id);

    // Update the category with the validated data
    $category->update($data);

    return back()->with('success', __("admin.updated"));
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //dd($category);
        $category->delete();
        return back()->with("success", __("admin.deleted"));
        //
    }
}
