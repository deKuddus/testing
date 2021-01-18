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

// Route::middleware('auth:api')->group(function () {
//Route::apiResource('packages', 'API\PackageController');
//});


Route::group(['prefix'=>'package', 'middleware' => ['auth:api','api.permission']], function() {

	Route::apiResource('packages', 'API\PackageController');

});