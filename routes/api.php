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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::post('register', 'App\Http\Controllers\UserController@register');
Route::post('login', 'App\Http\Controllers\UserController@authenticate');

Route::group(['middleware' => ['jwt.verify']], function() {

    Route::post('user','App\Http\Controllers\UserController@getAuthenticatedUser');
    Route::get('user','App\Http\Controllers\UserController@getAuthenticatedUser');

});

Route::get('/products', 'App\Http\Controllers\ProductController@index');
Route::post('/products', 'App\Http\Controllers\ProductController@store');
Route::get('/products/{product}', 'App\Http\Controllers\ProductController@show');
Route::put('/products/{product}', 'App\Http\Controllers\ProductController@update');
Route::delete('/products/{product}', 'App\Http\Controllers\ProductController@destroy');


Route::get('/categories', 'App\Http\Controllers\CategoryController@index');
Route::post('/categories', 'App\Http\Controllers\CategoryController@store');
Route::get('/categories/{category}', 'App\Http\Controllers\CategoryController@show');
Route::put('/categories/{category}', 'App\Http\Controllers\CategoryController@update');
Route::delete('/categories/{category}', 'App\Http\Controllers\CategoryController@destroy');

Route::get('/category_products', 'App\Http\Controllers\CategoryProductController@index');
Route::post('/category_products', 'App\Http\Controllers\CategoryProductController@store');
Route::get('/category_roducts/{category_product}', 'App\Http\Controllers\CategoryProductController@show');
Route::put('/category_products/{category_product}', 'App\Http\Controllers\CategoryProductController@update');
Route::delete('/category_products/{category_product}', 'App\Http\Controllers\CategoryProductController@destroy');