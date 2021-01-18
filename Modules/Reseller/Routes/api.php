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

// Route::middleware('auth:api')->get('/reseller', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix'=>'reseller', 'middleware' => ['auth:api','api.permission']], function() {

	Route::apiResource('resellers', 'API\APiResellerController');

});

Route::group(['prefix'=>'manage-vps', 'middleware' => ['auth:api','api.permission']], function() {

	Route::apiResource('vps', 'API\ApiVpsController');
	Route::get('list-vps', 'API\ApiVpsController@index');
	Route::get('online-vps', 'API\ApiVpsController@onlineVps');
	
});

Route::group(['prefix'=>'manage-ticket', 'middleware' => ['auth:api','api.permission']], function() {

	Route::apiResource('tickets', 'API\ApiTicketsController');
	Route::get('pending-ticket', 'API\ApiTicketsController@pending');
	
});