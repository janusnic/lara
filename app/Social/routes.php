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
Route::controllers([
    'auth' => 'App\Social\AuthController',
    'password' => 'App\Social\PasswordController',
]);

Route::get(config('authenticator.login_page'), function() {
    return view('social.login');
});

Route::get(config('authenticator.logout'), function() {
    return $this->app['authenticator']->logout();
});

Route::get(config('authenticator.login_redirect'), function() {
    $user = App\User::find(\Auth::id());
    return view('social.dashboard')->with('user', $user);
});

Route::get('sauth/{provider?}', function($provider = null) {
    return $this->app['authenticator']->login($provider);
});

Route::get('activate/{code}', 'App\Social\AuthController@accountIsActive');
