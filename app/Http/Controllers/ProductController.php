<?php

namespace App\Http\Controllers;
use App\Product;
use App\Wishlist;
use App\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('pages.products.index', compact('products'));
    }

    public function show($slug){
        $products = Product::where('slug', $slug)->first();
        return view('pages.products.single', compact('products'));
    }

    public function store( Request $request, $id){

        //take id from html
        $wishlist_id = $request->get('product_wishlist_id');

        if($wishlist_id == true){
            //search id from products get this product
            $products = Product::where('id', $wishlist_id)->first();
            //if id null echo error
            if( is_null($products)){
                return redirect('/products');
            }
            //save product in table Wishlist
            $wishlist = new Wishlist;
            $wishlist->product_id = $products->id;
            $wishlist->product_title = $products->title;
            $wishlist->product_slug = $products->slug;
            $wishlist->product_price = $products->price;
            $wishlist->product_text = $products->image;
            $wishlist->user_id = Auth::user()->id;
            $wishlist->save();
        }

         //take id from html
        $cart_id = $request->get('product_cart_id');
        if($cart_id == true){
            //search id from products get this product
            $products = Product::where('id', $cart_id)->first();

            //if id null echo error or redirect this page
            if( is_null($products)){
                return redirect('/products');
            }



            //save product in table Cart
            $cart = new Cart;
            $cart->product_id = $products->id;
            $cart->product_title = $products->title;
            $cart->product_slug = $products->slug;
            $cart->product_price = $products->price;
            $cart->product_text = $products->image;
            $cart->user_id = Auth::user()->id;
            $cart->save();
        }

        return redirect()->back();
    }

}

