<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    function index()
    {
        $Blogs=Blog::all();
        return view("front.blog",compact('Blogs'));
    }
}
