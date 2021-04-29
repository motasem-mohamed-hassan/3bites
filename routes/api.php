<?php

use App\Extra;
use App\Size;
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
    Route::get('category/{id}', 'CategoryController@show');


    //Products
    Route::get('products', 'ProductController@index');
    Route::get('product/{id}', 'ProductController@show');

    Route::middleware('auth:api')->group(function(){

        Route::post('/logout', 'AuthController@logout');
    });

    Route::get('extrabyproductid/{id}', 'ProductController@getextra');

    //Orders
    Route::post('orders/store', 'OrderController@store_order');

    Route::post('/register', 'AuthController@register');
    Route::post('/login', 'AuthController@login');


});
