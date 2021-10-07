<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\User;
use App\Post;
class DashboardController extends Controller
{
   public function index()
   {
        $posts = Post::count();
        $categories = Category::count();
        $users = User::count();
        return  view('general_admin.dashboard', compact('categories','posts','users'));
   }
}
