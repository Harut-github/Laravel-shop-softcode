<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $posts = Post::where ( 'title', 'LIKE', '%' . $search . '%' )->orWhere ( 'title', 'LIKE', '%' . $search . '%' )->get ();
        return view('pages.search.index', compact('posts'));
    }
}
