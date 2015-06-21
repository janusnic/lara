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
Route::resource('blog', 'PostsController');
Route::get('/hel', function () {
    return 'Hello world!';
});

Route::get('/wel', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('home.index');
});

Route::get('posts', function()
{
    //return 'all posts';
    
    $posts = App\Post::all();
 
    return view('posts.index', ['posts', $posts]);
});
//Route::get('posts', 'PostsController@index');
Route::get('blog', 'PostsController@index');
//Route::get('blog/{slug}', 'BlogController@showPost');
