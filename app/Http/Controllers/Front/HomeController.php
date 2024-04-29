<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    function index()
    {
        $blogs=Blog::all()->take(3);
        return view("front.home",compact('blogs'));
    }
}
