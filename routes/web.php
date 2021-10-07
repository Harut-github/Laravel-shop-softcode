<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('pages.layout');
// });
Route::get('/', 'HomeController@index');

Route::get('/search', 'SearchController@index');

Route::get('/json','JsonsController@index');

Route::group(['middleware'=>'auth'], function(){
    Route::get('/blog', 'BlogController@index')->name('blog');
    Route::get('/blog/{slug}', 'BlogController@single');
    Route::post('/comment', 'BlogController@comment')->name('comment');
});

Route::get('/category/{slug}', 'BlogController@getPostsCategory')->name('getPostsCategory');

Route::get('/mypage','MypageController@index');

Route::get('/register', 'AuthController@registerForm');
Route::post('/register', 'AuthController@register')->name('register');
Route::get('/login','AuthController@login')->name('login');
Route::post('/','AuthController@checkLogin')->name('checkLogin');
Route::post('/login','AuthController@logout')->name('logout');

Route::group(['prefix'=>'general_admin','namespace'=>'Admin','middleware'=>'admin'], function(){
    Route::get('/', 'DashboardController@index');
    Route::resource('/categories', 'CategoriesController');
    Route::resource('/posts', 'PostsController');
    Route::resource('/users', 'UsersController');
    Route::resource('/comments', 'CommentsController');
});


