<?php

namespace App\Http\Controllers;
use App\Cart;
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
}
