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

Route::group(['prefix'=>'reseller','module' => 'Reseller', 'middleware' => ['web','permission']], function() {

	Route::resource('resellers', 'ResellerController');

	Route::get('bulk-reseller', function () {
		
		return view('reseller::bulkreseller.index',['pageTitle'=>'Add Bulk Reseller']);
	});
});

Route::group(['prefix'=>'reseller','module' => 'Reseller', 'middleware' => ['web']], function() {

	Route::get('bulk-reselller-create/{row}/{username}','ResellerController@getRow');

	Route::post('bulk-reseller-store', [
		'as' => 'bulk.reseller.batch.store',
		'uses' => 'ResellerController@bulk_reseller_batch_store'
	]);
});


Route::group(['prefix'=>'manage-vps','module' => 'Reseller', 'middleware' => ['web','permission']], function() {

	Route::resource('vps', 'VpsController');
	Route::get('list-vps', 'VpsController@index');
	Route::get('online-vps', 'VpsController@onlineVps');

});

Route::group(['prefix'=>'manage-ticket','module' => 'Reseller', 'middleware' => ['web','permission']], function() {

	Route::resource('tickets', 'TicketsController');
	Route::get('pending-ticket', 'TicketsController@pending');
	

});