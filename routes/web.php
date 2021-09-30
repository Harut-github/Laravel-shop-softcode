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

Route::get('/', function () {
    return view('pages.layout');
});

Route::get('/search', 'SearchController@index');

Route::get('/json','JsonsController@index');

Route::get('/blog', 'BlogController@index');
Route::get('/blog/{slug}', 'BlogController@single');


Route::get('/general_admin', 'Admin\DashboardController@index');
Route::resource('/general_admin/categories', 'Admin\CategoriesController');

Route::resource('/general_admin/posts', 'Admin\PostsController');

