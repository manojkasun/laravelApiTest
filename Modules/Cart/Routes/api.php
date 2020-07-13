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

/*Route::middleware('auth:api')->get('/cart', function (Request $request) {
    return $request->user();
});*/

Route::delete('item/{id}', 'CartController@deleteitem');

Route::post('/addcart', 'CartController@addToCart');
Route::get('item/{id}', 'CartController@view');
