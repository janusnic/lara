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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hey', function()
{
    return 'Hello World';
});

Route::get('/hell', function() {
    return view('greeting');
});

Route::get('/jan', function() {
    return view('hello.greeting', ['name' => 'Janus']);
});

Route::get('/about', 'AboutController@showIndex');

Route::get('foo', ['uses' => 'AboutController@fooIndex', 'as' => 'name']);

Route::get('bar', 'AboutController@barIndex');

Route::get('bax', 'AboutController@baxIndex');

Route::get('baz', 'AboutController@bazIndex');
