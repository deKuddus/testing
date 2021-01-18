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

Route::middleware('auth:api')->group(function () {

	Route::apiResource('my-image', 'API\MyImageController');
	Route::apiResource('my-preferences', 'API\MyPreferencesController');
	Route::apiResource('change-password', 'API\ChangePasswordController');

});


Route::group(['prefix'=>'setups', 'middleware' => ['auth:api','api.permission']], function() {

	Route::apiResource('system-information', 'API\SystemInformationController');
	Route::apiResource('roles', 'API\RolesController');
	Route::apiResource('role-permissions', 'API\RolePermissionsController');

	Route::apiResource('admins', 'API\AdminController');
	Route::get('admin/create', 'API\AdminController@create');
	Route::get('admin/edit/{id}', 'API\AdminController@edit');

});