<?php

namespace App\Http\Controllers\Admin;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
     public function index()
     {
        $categories = Category::all();

        return view('general_admin.categories.index', compact('categories'));
     }

     public function create()
     {
        return view('general_admin.categories.create');
     }

     public function store()
     {
        Category::create(request()->validate([
            'title' => ['required', 'min:3'],
            'slug' => ['required','unique:categories', 'min:3']
        ]));

        return redirect('/general_admin/categories');
     }

     public function edit(Category $category)
     {
        return view('general_admin.categories.edit', compact('category'));
     }

     public function update(Category $category)
     {
        $category->update(request()->validate([
            'title' => ['required', 'min:3'],
            'slug' => ['required','unique:categories','min:3'],
        ]));

        return redirect('/general_admin/categories');
     }

     public function destroy(Category $category)
     {
        $category->delete();

        return redirect('/general_admin/categories');
     }
}
