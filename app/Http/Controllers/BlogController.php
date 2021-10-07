<?php

namespace App\Http\Controllers;
use App\Category;
use App\Post;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //Post page
    public function index()
    {

        $posts = Post::paginate(1);
        $categories = Category::orderBy('title')->get(); //filter abc
        return view('pages.blog.index', compact('posts','categories'));
    }

    //Post single page
    public function single($slug)
    {
        $comments = Comment::all();
        $posts = Post::where('slug', $slug)->first();

        //for post views count
        $views = $posts->views;
        $views++;
        $posts->update(['views' => $views]);

        return view('pages.blog.single', compact('posts','comments'));
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

    public function comment(Request $request)
    {

        $this->validate($request, [
            'comment' => 'required',
        ]);

        $comment = new Comment;
        $comment->comment = $request->get('comment');
        $comment->post_id = $request->get('post_id');
        $comment->user_id = Auth::user()->id;
        $comment->save();

        return redirect()->back();
    }
}
