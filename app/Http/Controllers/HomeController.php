<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index()
   {
       //top 3 posts
        $max = Post::all('views');
        $posts_top = Post::orderBy('views','DESC')->limit(3)->get();

        //bed post
        $min = Post::min('views');
        $posts_bed = Post::where('views',$min)->first();

        //rand post
        $posts_random = Post::inRandomOrder()->first();

        return view('pages.home.index', compact('posts_top','posts_bed','posts_random'));
   }
}
