<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::group(['prefix' => 'v1'], function () {
    Route::resource('blocks', 'api\v1\BlocksController');
    Route::resource('resources','api\v1\ResourceController');
    Route::resource('foams','api\v1\FoamController');
    Route::resource('primesilos','api\v1\PrimesilosController');
    Route::resource('wastesilos','api\v1\WastesilosController');
});
