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


//MASTER
//kecamatan
Route::get('/master/kecamatan', 'App\Http\Controllers\api\v1\master\KecamatanController@index');
Route::get('/master/kecamatan/{id?}', 'App\Http\Controllers\api\v1\master\KecamatanController@show');
Route::post('/master/kecamatan/add', 'App\Http\Controllers\api\v1\master\KecamatanController@store');
Route::post('/master/kecamatan/update', 'App\Http\Controllers\api\v1\master\KecamatanController@update');
Route::delete('/master/kecamatan/{id?}', 'App\Http\Controllers\api\v1\KecamatanController@destroy');


//keluarahan
Route::get('/master/kelurahan', 'App\Http\Controllers\api\v1\master\KelurahanController@index');
Route::get('/master/kelurahan/{id?}', 'App\Http\Controllers\api\v1\master\KelurahanController@show');
Route::post('/master/kelurahan/add', 'App\Http\Controllers\api\v1\master\KelurahanController@store');
Route::post('/master/kelurahan/update', 'App\Http\Controllers\api\v1\master\KelurahanController@update');
Route::delete('/master/kelurahan/{id?}', 'App\Http\Controllers\api\v1\master\KelurahanController@destroy');

//disabilitas
Route::get('/master/disabilitas', 'App\Http\Controllers\api\v1\master\DisabilitasController@index');
Route::get('/master/disabilitas/{id?}', 'App\Http\Controllers\api\v1\master\DisabilitasController@show');
Route::post('/master/disabilitas/add', 'App\Http\Controllers\api\v1\master\DisabilitasController@store');
Route::post('/master/disabilitas/update', 'App\Http\Controllers\api\v1\master\DisabilitasController@update');
Route::delete('/master/disabilitas/{id?}', 'App\Http\Controllers\api\v1\master\DisabilitasController@destroy');

//tempat pengobatan
Route::get('/master/tempatPengobatan', 'App\Http\Controllers\api\v1\master\TempatPengobatanController@index');
Route::get('/master/tempatPengobatan/{id?}', 'App\Http\Controllers\api\v1\master\TempatPengobatanController@show');
Route::post('/master/tempatPengobatan/add', 'App\Http\Controllers\api\v1\master\TempatPengobatanController@store');
Route::post('/master/tempatPengobatan/update', 'App\Http\Controllers\api\v1\master\TempatPengobatanController@update');
Route::delete('/master/tempatPengobatan/{id?}', 'App\Http\Controllers\api\v1\master\TempatPengobatanController@destroy');

//penyakit yang diderita
Route::get('/master/penyakit', 'App\Http\Controllers\api\v1\master\PenyakitController@index');
Route::get('/master/penyakit/{id?}', 'App\Http\Controllers\api\v1\master\PenyakitController@show');
Route::post('/master/penyakit/add', 'App\Http\Controllers\api\v1\master\PenyakitController@store');
Route::post('/master/penyakit/update', 'App\Http\Controllers\api\v1\master\PenyakitController@update');
Route::delete('/master/penyakit/{id?}', 'App\Http\Controllers\api\v1\master\PenyakitController@destroy');

//LOG USER
Route::post('/posts/store', 'App\Http\Controllers\api\v1\PostsController@store');
Route::post('/posts/update', 'App\Http\Controllers\api\v1\PostsController@update');
Route::delete('/posts/{id?}', 'App\Http\Controllers\api\v1\PostsController@destroy');
Route::get('/posts', 'App\Http\Controllers\api\v1\PostsController@index');
Route::get('/posts/{id?}', 'App\Http\Controllers\api\v1\PostsController@show');

//FORMULIR
// Route::post('/formulir', 'App\Http\Controllers\api\v1\FormulirController@store');
// Route::get('/formulir', 'App\Http\Controllers\api\v1\FormulirController@index');

//DATA PERSONAL
Route::post('/dataPersonal', 'App\Http\Controllers\api\v1\DataPersonalController@store');
Route::post('/dataPersonal/update/', 'App\Http\Controllers\api\v1\DataPersonalController@update');
Route::get('/dataPersonal', 'App\Http\Controllers\api\v1\DataPersonalController@index');
Route::get('/dataPersonal/{id?}', 'App\Http\Controllers\api\v1\DataPersonalController@show');
Route::delete('/dataPersonal/{id?}', 'App\Http\Controllers\api\v1\DataPersonalController@destroy');


//Formulir input
Route::get('/formulir', [App\Http\Controllers\api\v1\FormulirController::class, 'index']);
Route::post('/formulir/add', [App\Http\Controllers\api\v1\FormulirController::class, 'store']);
Route::get('/formulir/{id?}', [App\Http\Controllers\api\v1\FormulirController::class, 'show']);
Route::post('/formulir/update', [App\Http\Controllers\api\v1\FormulirController::class, 'update']);
Route::delete('/formulir/{id?}', [App\Http\Controllers\api\v1\FormulirController::class, 'destroy']);
