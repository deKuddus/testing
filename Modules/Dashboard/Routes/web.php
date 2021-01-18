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

Route::prefix('dashboard')->group(function() {
    Route::get('/', 'DashboardController@index');

});

Route::get('changePassword/{id}', 'DashboardController@changePassword');
Route::patch('update/password/{id}', 'DashboardController@updatePassword')->name('password.update');