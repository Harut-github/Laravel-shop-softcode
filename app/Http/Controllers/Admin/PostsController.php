<?php

namespace App\Http\Controllers\Admin;
use App\Post;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsController extends Controller
{
     public function index()
     {
           $posts  = Post::all();
           return view('general_admin.posts.index', compact('posts'));
     }

     public function create()
      {
         return view('general_admin.posts.create');
      }

      public function store()
      {
         Post::create(request()->validate([
             'title' => ['required', 'min:3'],
             'slug' => ['required','unique:categories', 'min:3']
         ]));

         return redirect('/general_admin/posts');
      }

      public function edit($id)
       {
           $post = Post::find($id);
           $categories = Category::all();
          return view('general_admin.posts.edit', compact('post','categories'));
       }

       public function update(Post $Post)
       {
          $Post->update(request()->validate([
              'title' => ['required', 'min:3'],
              'slug' => ['required','unique:categories','min:3'],
          ]));

          return redirect('/general_admin/posts');
       }

       public function destroy(Post $Post)
       {
          $Post->delete();

          return redirect('/general_admin/posts');
       }

}
