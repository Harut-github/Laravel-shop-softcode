<?php

namespace App\Http\Controllers;
use App\Product;
use App\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();

        return view('pages.products.index', compact('products'));
    }
    
    public function single($slug){
        $products = Product::where('slug', $slug)->first();
        return view('pages.products.single', compact('products'));
    }
         
    public function store(Request $request){

        $wishlist = new Wishlist;
            
        $wishlist->product_title = $request->get('product_title');
        $wishlist->product_slug = $request->get('product_slug');
        $wishlist->product_price = $request->get('product_price');
        $wishlist->product_text = $request->get('product_img');
        $wishlist->product_id = $request->get('product_id');
        $wishlist->user_id = Auth::user()->id;

        $wishlist->save();
        
        return redirect()->back();
    }

  
}

