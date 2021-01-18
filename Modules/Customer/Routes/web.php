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

Route::group(['prefix'=>'manage-pin','module' => 'Customer', 'middleware' => ['web','permission']], function() {

	Route::resource('customers', 'CustomerController');

	Route::get('customer-bulk-pin', function () {
		return view('customer::bulkpin.index',['pageTitle'=>'Add Bulk Pin']);
	});

	  Route::get('online-users', 'CustomerController@onlineUsers');
});

Route::group(['prefix'=>'manage-pin','module' => 'Customer', 'middleware' => ['web']], function() { 

	Route::get('bulk-pin-create/{row}/{username}','CustomerController@getRow');

	Route::post('bulk-pin-store', [
		'as' => 'bulk.pin.batch.store',
		'uses' => 'CustomerController@bulk_pin_batch_store'
	]);
});

Route::group(['prefix'=>'accounts','module' => 'Customer', 'middleware' => ['web','permission']], function() { 

	Route::get('paid-users','AccountsController@paid_users');
	Route::get('unpaid-users','AccountsController@unpaid_users');

});