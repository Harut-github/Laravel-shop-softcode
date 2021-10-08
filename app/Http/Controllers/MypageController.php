<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
class MypageController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('pages.mypage.index', compact('user'));
    }

    public function wishList(){
        $user = Auth::user();
        return view('pages.mypage.wishlist', compact('user'));
    }

}
