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

Route::namespace('Api')->group(function(){
    //Categories
    Route::get('categories', 'CategoryController@index');
    Route::post('categories', 'CategoryController@store');
    Route::get('category/{id}', 'CategoryController@show');
    Route::put('category/update/{id}', 'CategoryController@update');
    Route::delete('category/delete/{id}', 'CategoryController@destroy');


    //Products
    Route::get('products', 'ProductController@index');
    Route::post('products', 'ProductController@store');
    Route::get('product/{id}', 'ProductController@show');
    Route::put('product/update/{id}', 'ProductController@update');
    Route::delete('product/delete/{id}', 'ProductController@destroy');

});

