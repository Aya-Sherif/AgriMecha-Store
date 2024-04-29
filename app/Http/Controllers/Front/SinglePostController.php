<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class SinglePostController extends Controller
{
    //
    public function index(Blog $post)
    {

      return  view('front.singlepost', compact('post'));
    }
}
