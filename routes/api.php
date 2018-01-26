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

Route::post('/UserAccount/create', 'CMSController@create');
Route::post('/UserAccount/show_all', 'CMSController@show_all');
Route::post('/UserAccount/show/{id}', 'CMSController@show');
Route::post('/UserAccount/remove/{id}', 'CMSController@destroy');
Route::post('/UserAccount/update', 'CMSController@update');
Route::post('/UserAccount/remove_all/{id}', 'CMSController@destroy_all');