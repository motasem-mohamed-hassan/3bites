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


Route::namespace('Api')->group(function(){
    //infos
    Route::get('infos', 'InfoController@index');
    //Categories
    Route::get('categories', 'CategoryController@index');
    // Route::post('categories', 'CategoryController@store');
    Route::get('category/{id}', 'CategoryController@show');
    // Route::put('category/update/{id}', 'CategoryController@update');
    // Route::delete('category/delete/{id}', 'CategoryController@destroy');


    //Products
    Route::get('products', 'ProductController@index');
    // Route::post('products', 'ProductController@store');
    Route::get('product/{id}', 'ProductController@show');
    // Route::put('product/update/{id}', 'ProductController@update');
    // Route::delete('product/delete/{id}', 'ProductController@destroy');

    Route::middleware('auth:api')->group(function(){
        // Route::post('/order/store', 'OrderController@store_order');
        // Route::get('order_list/{user_id}', 'OrderController@get_order_list');
        // Route::get('order_details/{order_id}', 'OrderController@get_order_details');
        // Route::post('cancel_order', 'OrderController@cancel_order');


        Route::post('/logout', 'AuthController@logout');
    });

    Route::post('/register', 'AuthController@register');
    Route::post('/login', 'AuthController@login');


});
