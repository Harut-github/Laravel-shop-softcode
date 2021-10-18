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



Route::get('/', 'HomeController@index');

Route::get('/search', 'SearchController@index');

Route::get('/json','JsonsController@index');

Route::get('/category/{slug}', 'BlogController@getPostsCategory')->name('getPostsCategory');

Route::get('/register', 'AuthController@registerForm');
Route::post('/register', 'AuthController@register')->name('register');
Route::get('/login','AuthController@login')->name('login');
Route::post('/','AuthController@checkLogin')->name('checkLogin');
Route::post('/login','AuthController@logout')->name('logout');


Route::group(['middleware'=>'auth'], function(){
    Route::resource('/products','ProductController');
    Route::get('/products/{slug}','ProductController@single');

    Route::get('/blog', 'BlogController@index')->name('blog');
    Route::get('/blog/{slug}', 'BlogController@single');

    Route::post('/comment', 'BlogController@comment')->name('comment');

    Route::resource('/mypage','MypageController');
    // Route::delete('/mypage','MypageController@destroy')->name('mypage');

    Route::resource('/wishlist','WishlistController');
    //count wishlist this user ajax
    Route::get('load-wishlist-count','WishlistController@WishlistCount');

    Route::get('/delete_cart_items','CartController@deleteCartItems');
    Route::get('/thanks','CartController@thanks');

    Route::resource('/cart','CartController');

    // chat
    Route::resource('/messages','MessagesController');
});

Route::group(['prefix'=>'general_admin','namespace'=>'Admin','middleware'=>'admin'], function(){
    Route::get('/', 'DashboardController@index');
    Route::resource('/categories', 'CategoriesController');
    Route::resource('/posts', 'PostsController');
    Route::resource('/users', 'UsersController');
    Route::resource('/comments', 'CommentsController');
    Route::resource('/products', 'ProductsController');
});


