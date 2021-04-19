<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('send', 'HomeController@sendNotification'); //for notification


Route::prefix('dashboard')->group(function(){

    //categories
    Route::get('categories', 'CategoryController@index');
    Route::post('categories', 'CategoryController@store');
    Route::get('category/{id}', 'CategoryController@show');
    Route::put('category/update/{id}', 'CategoryController@update');
    Route::delete('category/delete/{id}', 'CategoryController@destroy');

    //Products
    Route::get('products', 'ProductController@index');
    Route::post('products', 'ProductController@store')->name('product.store');
    Route::get('product/{id}', 'ProductController@show');
    Route::put('product/update/{id}', 'ProductController@update');
    Route::delete('product/delete/{id}', 'ProductController@destroy');


});
