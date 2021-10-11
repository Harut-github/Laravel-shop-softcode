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

        return view('pages.mypage.cart', compact('carts'));
    }

    //take count cart this user send route , route send ajax, ajax send html
    public function CartCount(){
        $user = Auth::user();

    	$countcart = Cart::where('user_id',$user->id)->count();
    	return response()->json(['count'=>$countcart]);
    }

    public function destroy($id){

    	$cart = Cart::find($id);

    	$cart->delete();

    	return redirect('/cart');
   }
}
