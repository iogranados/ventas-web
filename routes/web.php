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

Route::get('/sellers', 'SellerController@index')->name('sellers');

Route::get('/customers', 'CustomerController@index')->name('customers');

Route::get('/products', 'ProductController@index')->name('products');

Route::get('/payments', 'PaymentController@index')->name('payments');

Route::get('get-data-sellers', ['as'=>'get.data.sellers','uses'=>'SellerController@getData']);

Route::get('get-data-customers', ['as'=>'get.data.customers','uses'=>'CustomerController@getData']);

Route::get('get-data-products', ['as'=>'get.data.products','uses'=>'ProductController@getData']);

Route::get('get-data-payments', ['as'=>'get.data.payments','uses'=>'PaymentController@getData']);
