<?php

namespace App\Http\Controllers;
use App\Category;
use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(1);
        $categories = Category::orderBy('title')->get(); //filter abc
        return view('pages.blog.index', compact('posts','categories'));
    }

    public function single($slug)
    {

        $posts = Post::where('slug', $slug)->first();

        //for post views count
        $views = $posts->views;
        $views++;
        $posts->update(['views' => $views]);

        return view('pages.blog.single', compact('posts'));
    }


    //for categories fillter
    public function getPostsCategory($slug)
    {
        $categories = Category::orderBy('title')->get();
        $current_category = Category::where('slug',$slug)->first();
        return view('pages.blog.index', [
            'posts'=> $current_category->posts()->paginate(),
            'categories'=> $categories,
        ]);
    }
}
