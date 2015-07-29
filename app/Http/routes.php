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

Route::get('rss', 'PostsController@rss');
Route::get('sitemap', 'PostsController@siteMap');

Route::get('/', function () {
    return view('home.index');
});

Route::resource('users', 'UsersController');

Route::get('contact', 
  ['as' => 'contact', 'uses' => 'PagesController@contact']);
Route::post('contact', 
  ['as' => 'contact_store', 'uses' => 'PagesController@constore']);

Route::group(['middleware' => ['auth']], function()
{
	// show new post form
	//Route::get('new-post','PostController@create');
	
	// save new post
	//Route::post('new-post','PostController@store');
	
	// edit post form
	//Route::get('edit/{slug}','PostController@edit');
	
	// update post
	//Route::post('update','PostController@update');
	
	// delete post
	//Route::get('delete/{id}','PostController@destroy');
	
	// display user's all posts
	//Route::get('my-all-posts','UserController@user_posts_all');
	
	// display user's drafts
	//Route::get('my-drafts','UserController@user_posts_draft');
	
	
	// add comment
	Route::post('comment/add','CommentsController@store');
	
	// delete comment
	Route::post('comment/delete/{id}','CommentsController@distroy');
	
});

Route::any('captcha-test', function()
    {
        if (Request::getMethod() == 'POST')
        {
            $rules = ['captcha' => 'required|captcha'];
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails())
            {
                echo '<p style="color: #ff0000;">Incorrect!</p>';
            }
            else
            {
                echo '<p style="color: #00ff30;">Matched :)</p>';
            }
        }

        $form = '<form method="post" action="captcha-test">';
        $form .= '<input type="hidden" name="_token" value="' . csrf_token() . '">';
        $form .= '<p>' . captcha_img() . '</p>';
        $form .= '<p><input type="text" name="captcha"></p>';
        $form .= '<p><button type="submit" name="check">Check</button></p>';
        $form .= '</form>';
        return $form;
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
