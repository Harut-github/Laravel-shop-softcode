<?php

namespace App\Http\Controllers;
use App\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WishlistController extends Controller
{		
    public function index(){
    	$user = Auth::user();
    	
        $wishlists = Wishlist::where('user_id',$user->id)->get();
        $countwishlists = Wishlist::where('user_id',$user->id)->count();
        
        return view('pages.mypage.wishlist', compact('countwishlists','wishlists'));
    }
    
    public function destroy($id){

    	$wishlist = Wishlist::find($id);
    
    	$wishlist->delete();

    	return redirect('/wishlist');
   }
}
