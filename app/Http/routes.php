<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//Route::resource('posts', 'PostsController');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
/**/
// Authentication routes...
/* Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

*/
// Admin area
Route::get('adm', 'cms\PostsController@index');
Route::get('adm/posts', 'cms\PostsController@postlist');
//Route::get('adm/create', ['middleware' => 'auth', 'uses' => 'cms\PostsController']);
Route::resource('adm', 'cms\PostsController');

// Blog area
Route::resource('blog', 'PostsController');



Route::get('/', function () {
    return view('home.index');
});

/*
Route::get('posts', function()
{
    //return 'all posts';

    $posts = App\Post::all();

    return view('posts.index', ['posts', $posts]);
});
*/
//Route::get('posts', 'PostsController@index');
//Route::get('blog', 'PostsController@index');

//Route::get('blog/{slug}', 'BlogController@showPost');

Route::get('/hel', function () {
    return 'Hello world!';
});

Route::get('/wel', function () {
    return view('welcome');
});

//Route::get('adm', 'cms\PostsController@index');
