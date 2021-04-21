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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('send', 'HomeController@sendNotification'); //for notification


Route::namespace('Dashboard')->as('d.')->middleware(['auth:admin'])->group(function(){

    Route::get('/', 'DhomeController@index')->name('home');

    //categories
    Route::get('categories', 'DcategoryController@index')->name('category.index');
    Route::post('categories', 'DcategoryController@store')->name('category.store');
    // Route::get('category/{id}', 'DcategoryController@show')->name('category.store');
    Route::put('category/update/{id}', 'DcategoryController@update')->name('category.update');
    Route::delete('category/delete/{id}', 'DcategoryController@destroy')->name('category.delete');

    //Products
    Route::get('products', 'DproductController@index')->name('product.index');
    Route::post('products', 'DproductController@store')->name('product.store');
    // Route::get('product/{id}', 'DproductController@show');
    Route::put('product/update', 'DproductController@update')->name('product.update');
    Route::delete('product/delete/{id}', 'DproductController@destroy')->name('product.delete');

    //users
    Route::get('users', 'DuserController@index')->name('user.index');

    //admins
    Route::get('admins', 'DadminController@index')->name('admin.index');

    Route::post('admins/register', 'DadminController@store')->name('admin.store');


});
