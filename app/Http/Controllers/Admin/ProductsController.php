<?php

namespace App\Http\Controllers\Admin;
use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
          $products  = Product::all();
          return view('general_admin.products.index', compact('products'));
    }

    public function create()
     {
        $products = Product::all();
        return view('general_admin.products.create', compact('products'));
     }

     public function store(Request $request)
     {

        Product::create(request()->validate([
            'title' => ['required', 'min:3'],
            'slug' => ['required','unique:products', 'min:3'],
            'price' => ['required'],
            'text' => [''],
            'image' => ['']
        ]));

        return redirect('/general_admin/products');
     }

     public function edit($id)
      {
          $product = Product::find($id);
          return view('general_admin.products.edit', compact('product'));
      }

      public function update(Product $Product)
      {

         $Product->update(request()->validate([
            'title' => ['required', 'min:3'],
            'slug' => ['required', 'min:3'],
            'price' => ['required'],
            'text' => [''],
            'image' => ['']
         ]));
         $Product->save();

         return redirect('/general_admin/products');
      }

      public function destroy($id)
      {

       $product = Product::find($id);

       $product->delete();

       return redirect('/general_admin/products');
      }
}
