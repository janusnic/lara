<?php

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

Route::get('/', function()
{
    return View::make('pages.home');
});


Route::get('/', 'IndexController@index');
Route::get('/cats', 'CategoryController@list');
Route::get('/cats/{id}', 'CategoryController@show');
Route::resource('blog', 'ArticlesController');

// Categories
Route::resource('categories', 'CategoryController');
Route::resource('tags', 'TagController');
// Categories
// Route::resource('categories', 'CategoryController', ['except' => ['create']]);
// Route::resource('tags', 'TagController', ['except' => ['create']]);


Route::get('posts/tag', 'IndexController@tag');
Route::resource('posts', 'IndexController', ['except' => ['create']]);

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/admin','AdminController@index');
Route::get('/admin/login',['as' => 'admin.login','uses' => 'Admin\LoginController@showLoginForm']);
Route::post('/admin/login',['uses' => 'Admin\LoginController@login']);
Route::post('/admin/logout',['as' => 'admin.logout','uses' => 'Admin\LoginController@logout']);

Route::get('/{slug}', 'FrontPageController@index');
Route::model('page', 'App\Page');
Route::resource('/admin/page', 'AdminPageController');
