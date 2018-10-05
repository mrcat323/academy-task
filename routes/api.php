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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/page/features', 'HomeBlocksController@features');
Route::get('/page/screenshots', 'HomeBlocksController@screenshots');
Route::get('/page/blog', 'HomeBlocksController@blog');
Route::get('/page/pricing', 'HomeBlocksController@pricing');
Route::get('/page/contact', 'HomeBlocksController@contact');
