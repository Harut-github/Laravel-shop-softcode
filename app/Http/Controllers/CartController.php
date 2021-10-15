<?php

namespace App\Http\Controllers;
use App\Cart;
use App\Carthistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){

    	$user = Auth::user();

        $carts = Cart::where('user_id',$user->id)->get();

        // Count all price total and echo in html
        $total = Cart::where('user_id', $user->id)->sum('product_price_total');

        return view('pages.mypage.cart', compact('carts','total'));
    }

    public function destroy($id){

    	$cart = Cart::find($id);

    	$cart->delete();

    	return redirect('/cart');
   }

    public function deleteCartItems(Request $request, Cart $Cart){

        $user = Auth::user();
        $products = Cart::where('user_id', $user->id)->get();

        foreach ($products as $product) {
            //save carts product for this user history
            $history= new Carthistory;
            $history->product_id = $product->product_id;
            $history->product_title = $product->product_title;
            $history->product_slug = $product->product_slug;
            $history->product_price = $product->product_price;
            $history->product_price_total = $product->product_price_total;
            $history->product_count = $product->product_count;
            $history->product_text = $product->product_text;
            $history->user_id = Auth::user()->id;
            $history->save();

            $product->delete();
        }

    }

    public function thanks(){
        return view('pages.mypage.thanks');
    }

}
