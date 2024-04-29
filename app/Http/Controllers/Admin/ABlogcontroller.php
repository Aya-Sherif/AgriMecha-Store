<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ABlogcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Blog::all();
        return view("admin.blogs.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.blogs.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'subtitle' => 'required|string',
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',

            // Add validation rules for other fields as needed
        ]);

        // Handle file upload for PDF file


        // Handle file upload for image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . "." . $extention;
            $file->move('front/img/blog_imgs/', $filename);
            $validatedData['image'] = $filename;
            //  dd($validatedData['image']);
        }

        // Serialize additional data into JSON format
        $content = [];
        foreach ($request->keys as $index => $key) {
            if (!empty($key) && !empty($request->values[$index])) {
                $content[$key] = $request->values[$index];
            }
        }
        $validatedData['content'] = json_encode($content);
        //   dd($validatedData);
        // Create the product model and store in the database

        $product = Blog::create($validatedData);

        // Redirect to a success page or do any other necessary actions
        return redirect()->route('admin.blogs.create', $product->id)->with('success', __("admin.updated"));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post=Blog::findOrFail($id);
        return view("admin.blogs.showpost", compact("post"));


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Fetch the product by ID
        $post = blog::findOrFail($id);
        // Fetch all categories for the dropdown
        return view('admin.blogs.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'subtitle' => 'required|string',
            'title' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif',

            // Add validation rules for other fields as needed
        ]);


        // Fetch the product by ID
        $product = Blog::findOrFail($id);
        // Update product fields


        // Handle file upload for image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . "." . $extention;
            $file->move('front/img/blog_imgs/', $filename);
            $validatedData['image'] = $filename;
            //  dd($validatedData['image']);
        
        } else {
            $validatedData['image'] = $product->image;
        }

        // Serialize additional data into JSON format
        $content = [];
        foreach ($request->keys as $index => $key) {
            if (!empty($key) && !empty($request->values[$index])) {
                $content[$key] = $request->values[$index];
            }
        }
        $validatedData['content'] = json_encode($content);
        // Create the product model and store in the database

        $product->update($validatedData);

        // Redirect to a success page or do any other necessary actions
        return redirect()->route('admin.blogs.index', $product->id)->with('success', __("admin.updated"));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Blog::destroy($id);

        return back()->with("success", __("admin.deleted"));
    }
}
