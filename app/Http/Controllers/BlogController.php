<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
       $posts = Post::paginate(1);
        return view('pages.blog.index',  compact('posts'));
    }
    public function single($slug)
    {
        $posts = Post::where('slug', $slug)->firstOrFail();
        
        return view('pages.blog.single', compact('posts'));
    }
}
