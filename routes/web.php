<?php
Route::get('reboot', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    //file_put_contents(storage_path('logs/laravel.log'),'');
    Artisan::call('key:generate');
    Artisan::call('config:cache');
    return '<center><h1>System Rebooted!</h1></center>';
});

Auth::routes();

Route::get('/', 'HomeController@index');


Route::get('forget/password/request', function () {
		return view('auth.forget.email',['pageTitle'=>'Forget Password']);
	});


Route::post('user/send/mail', [
	'as' => 'user.resetpassword.sendmail',
	'uses' => 'ForgetController@sendmailtouser'
]);

Route::get('reset/user/password/{type}/{slug}','ForgetController@change_form');

Route::post('user/save-change', [
	'as' => 'user.pass.change',
	'uses' => 'ForgetController@save_chage_password'
]);