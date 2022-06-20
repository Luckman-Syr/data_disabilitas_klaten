<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//LOG USER
//post
Route::post('/v1/posts/store', 'App\Http\Controllers\api\v1\PostsController@store');
//update
Route::post('/v1/posts/update', 'App\Http\Controllers\api\v1\PostsController@update');
//detele
Route::delete('/v1/posts/{id?}', 'App\Http\Controllers\api\v1\PostsController@destroy');

Route::get('/v1/posts', 'App\Http\Controllers\api\v1\PostsController@index');
Route::get('/v1/posts/{id?}', 'App\Http\Controllers\api\v1\PostsController@show');

//FORMULIR
Route::post('/v1/posts/formulir', 'App\Http\Controllers\api\v1\FormulirController@store');