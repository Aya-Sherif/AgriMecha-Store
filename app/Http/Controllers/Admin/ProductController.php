<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\PModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = PModel::all();
        return view("admin.products.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'productname' => 'required|string',
            'name' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'pdf_file' => 'nullable|file|mimes:pdf',
            // Add validation rules for other fields as needed
        ]);

        // Handle file upload for PDF file
        if ($request->hasFile('pdf_file')) {
            $pdfPath = $request->file('pdf_file')->storeAs('pdfs', Str::uuid() . '.pdf');
            $validatedData['pdf_file'] = $pdfPath;
        }

        // Handle file upload for image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . "." . $extention;
            $file->move('front/img/products_img/', $filename);
            $validatedData['image'] = $filename;
            //  dd($validatedData['image']);
        }

        // Serialize additional data into JSON format
        $additionalData = [];
        foreach ($request->keys as $index => $key) {
            if (!empty($key) && !empty($request->values[$index])) {
                $additionalData[$key] = $request->values[$index];
            }
        }
        $validatedData['additional_data'] = json_encode($additionalData);
        $validatedData['category_id'] = $request->input('category_id');
        //   dd($validatedData);
        // Create the product model and store in the database

        $product = PModel::create($validatedData);

        // Redirect to a success page or do any other necessary actions
        return redirect()->route('admin.products.create', $product->id)->with('success', __("admin.updated"));
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
    public function edit($id)
    {
        // Fetch the product by ID
        $product = PModel::findOrFail($id);
        // Fetch all categories for the dropdown
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'productname' => 'required|string',
            'name' => 'required|string',
            'price' => 'required|numeric',
            'quantity'=>'required|numeric',
            'description' => 'required|string',
            'pdf_file' => 'nullable|file|mimes:pdf',
            // Add validation rules for other fields as needed
        ]);

        // Fetch the product by ID
        $product = PModel::findOrFail($id);
        // Update product fields

        // Handle file upload for PDF file
        if ($request->hasFile('pdf_file')) {
            $pdfPath = $request->file('pdf_file')->storeAs('pdfs', Str::uuid() . '.pdf');
            $validatedData['pdf_file'] = $pdfPath;
        } else {
            $validatedData['pdf_file'] = $product->pdf_file;
        }

        // Handle file upload for image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . "." . $extention;
            $file->move('front/img/products_img/', $filename);
            $validatedData['image'] = $filename;
            //  dd($validatedData['image']);

        } else {
            $validatedData['image'] = $product->image;
        }

        // Serialize additional data into JSON format
        $additionalData = [];
        foreach ($request->keys as $index => $key) {
            if (!empty($key) && !empty($request->values[$index])) {
                $additionalData[$key] = $request->values[$index];
            }
        }
        $validatedData['additional_data'] = json_encode($additionalData);
        $validatedData['category_id'] = $request->input('category_id');
        //   dd($validatedData);
        // Create the product model and store in the database

        $product->update($validatedData);

        // Redirect to a success page or do any other necessary actions
        return redirect()->route('admin.products.index', $product->id)->with('success', __("admin.updated"));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
     //   dd($pmodel);
     PModel::destroy($id);
     // dd($pmodel);

        return back()->with("success", __("admin.deleted"));
    }
}
