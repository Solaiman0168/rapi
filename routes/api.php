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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/class', 'App\Http\Controllers\Api\SclassController@index');
Route::get('show/class/{id}', 'App\Http\Controllers\Api\SclassController@show');
// Route::ApiResource('/class', 'App\Http\Controllers\Api\SclassController@index');
Route::post('/post/class', 'App\Http\Controllers\Api\SclassController@store');
Route::delete('delete/class/{id}', 'App\Http\Controllers\Api\SclassController@destroy');
Route::patch('update/class/{id}', 'App\Http\Controllers\Api\SclassController@update');


Route::fallback(function(){
    return response()->json([
        'message' => 'Page Not Found.']);
});
