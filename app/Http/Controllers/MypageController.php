<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Wishlist;
use App\Carthistory;
use Illuminate\Support\Facades\Auth;
class MypageController extends Controller
{
    public function index(){
        $user = Auth::user();
        $carthistories = Carthistory::where('user_id', $user->id)->get();
        return view('pages.mypage.index', compact('user','carthistories'));
    }

    public function destroy($id){

    	$carthistory = Carthistory::find($id);

    	$carthistory->delete();

    	return redirect('/mypage');
   }
}
