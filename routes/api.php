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
Route::get('/show/class/{id}', 'App\Http\Controllers\Api\SclassController@show');
// Route::ApiResource('/class', 'App\Http\Controllers\Api\SclassController@index');
Route::post('/post/class', 'App\Http\Controllers\Api\SclassController@store');
Route::patch('/update/class/{id}', 'App\Http\Controllers\Api\SclassController@update');
Route::delete('/delete/class/{id}', 'App\Http\Controllers\Api\SclassController@destroy');

Route::get('/subject', 'App\Http\Controllers\Api\SubjectController@index');
Route::get('/show/subject/{id}', 'App\Http\Controllers\Api\SubjectController@show');
Route::post('/post/subject', 'App\Http\Controllers\Api\SubjectController@store');
Route::patch('/update/subject/{id}', 'App\Http\Controllers\Api\SubjectController@update');
Route::delete('/delete/subject/{id}', 'App\Http\Controllers\Api\SubjectController@destroy');

Route::get('/section', 'App\Http\Controllers\Api\SectionController@index');
Route::get('/show/section/{id}', 'App\Http\Controllers\Api\SubjectController@show');
Route::post('/post/section', 'App\Http\Controllers\Api\SectionController@store');
Route::patch('/update/section/{id}', 'App\Http\Controllers\Api\SubjectController@update');
Route::delete('/delete/section/{id}', 'App\Http\Controllers\Api\SubjectController@destroy');

// Route::apiResource('/subject', 'App\Http\Controllers\Api\SubjectController@index');



Route::fallback(function(){
    return response()->json([
        'message' => 'Page Not Found.']);
});
