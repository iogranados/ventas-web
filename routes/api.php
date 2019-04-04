<?php

use Illuminate\Http\Request;

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


Route::get('/controls', ['uses' => 'ControlController@get']);
Route::get('/customers', ['uses' => 'CustomerController@get']);
Route::get('/products', ['uses' => 'ProductController@get']);
Route::get('/sellers', ['uses' => 'SellerController@get']);
Route::get('/orders', ['uses' => 'OrderController@get']);
Route::get('/orders/{id}', ['uses' => 'OrderController@getOrder']);
Route::post('/orders', ['uses' => 'OrderController@createOrder']);
Route::post('/orders/{id}/items', ['uses' => 'OrderItemController@createOrderItem']);
