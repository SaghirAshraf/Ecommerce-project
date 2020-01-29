<?php

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

Route::group(['as'=>'admin.', 'middleware'=> ['auth', 'admin'], 'prefix'=>'admin'], function (){

	Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
	Route::get('product/delete/{id}', 'ProductController@delete_data')->name('product.delete_data');
	Route::get('product/cart', 'ProductController@cart')->name('product.cart');
	Route::get('product/add-to-cart/{id}', 'ProductController@addToCart')->name('product.add_cart');
	Route::resource('product', 'ProductController');
	Route::resource('category', 'CategoryController');
});

