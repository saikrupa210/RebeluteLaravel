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

//route for the customers list
Route::get('home/customers', 'CustomerController@index');
Route::post('home/addCustomer', 'CustomerController@store');

//route for the vendors list
Route::get('home/vendors', 'VendorController@index');
Route::post('home/addVendor', 'VendorController@store');
