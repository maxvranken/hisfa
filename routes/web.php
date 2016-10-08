<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// route naar dashboard
//Route::get('/', 'Controller@index');

// route naar login
Route::get('/login', 'LoginController@login');

// route naar blocks focus
Route::get('/blocks', 'BlocksController@index');

// route naar primesilos focus
Route::get('/primesilos', 'PrimeSilosController@index');

// route naar wastesilos focus
Route::get('/wastesilos', 'WasteSilosController@index');

// route naar logs focus
Route::get('/logs', 'LogsController@index');
Auth::routes();

Route::get('/', 'HomeController@index');
