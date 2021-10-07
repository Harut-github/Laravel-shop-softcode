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
         $categories = Category::all();
         return view('general_admin.posts.create', compact('categories'));
      }

      public function store(Request $request)
      {
        //   dd($request->all());
         Post::create(request()->validate([
             'title' => ['required', 'min:3'],
             'slug' => ['required','unique:posts', 'min:3'],
             'category_id' => [''],
             'description' => [''],
             'text' => ['']
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
              'category_id' => [''],
              'description' => [''],
              'text' => ['']
          ]));

          $Post->save();

          return redirect('/general_admin/posts');
       }

       public function destroy($id)
       {

        $post = Post::find($id);

        $post->delete();

        return redirect('/general_admin/posts');
       }

}
