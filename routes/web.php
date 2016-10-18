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
Route::get('/', 'Controller@index');

// route naar login
Route::get('/login', 'LoginController@login');

//route naar profile
Route::get('/profile', 'UserController@profile');
Route::post('profile' , 'UserController@update_avatar');

// route naar primesilos focus
Route::get('/primesilos', 'PrimeSilosController@index');

// route naar wastesilos focus
Route::get('/wastesilos', 'WasteSilosController@index');

// route naar foam focus
Route::get('/foam', 'FoamController@index');
Route::get('/foams', 'FoamController@edit');
Route::get('/blocks', 'FoamController@ajax');
Route::put('/foam/qntyplus', 'FoamController@qntyplus');
Route::put('/foam/qntymin', 'FoamController@qntymin');
Route::put('/foam/newlength', 'FoamController@newlength');
Route::put('/foams/createtype', 'FoamController@createtype');
Route::put('/foams/edittype', 'FoamController@edittype');
Route::put('/foams/deletetype', 'FoamController@deletetype');

// route naar resource focus
Route::get('/resources', 'ResourceController@index');
Route::get('/resources/create', 'ResourceController@create');
Route::get('/resources/edit', 'ResourceController@edit');
Route::post('/store', 'ResourceController@addresource');
Route::put('/edited', 'ResourceController@editresource');
Route::put('/resources/changeqnty', 'ResourceController@editquantity');
Route::put('/resources/changeqntyplus', 'ResourceController@editquantityplus');
Route::put('/resources/changeqntyminus', 'ResourceController@editquantityminus');

// route naar logs focus
Route::get('/logs', 'LogsController@index');

//route naar settings
Route::get('/settings', 'SettingsController@index');
Auth::routes();


