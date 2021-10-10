<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Wishlist;
use Illuminate\Support\Facades\Auth;
class MypageController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('pages.mypage.index', compact('user'));
    }

}
