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

Route::middleware('auth:api')->get('/customer', function (Request $request) {
    return $request->user();
});


// Route::middleware('auth:api')->group(function () {

// 		Route::apiResource('customers', 'API\CustomerController');
// 		Route::get('online-users', 'API\CustomerController@onlineUsers');

// });


Route::group(['prefix'=>'accounts','module' => 'Customer', 'middleware' => ['auth:api','api.permission']], function() { 

		Route::get('paid-users','API\AccountsController@paid_users');
		Route::get('unpaid-users','API\AccountsController@unpaid_users');
});


Route::group(['prefix'=>'manage-pin','middleware' => ['auth:api','api.permission']], function() { 

		Route::apiResource('customers', 'API\CustomerController');
		Route::get('online-users', 'API\CustomerController@onlineUsers');
});