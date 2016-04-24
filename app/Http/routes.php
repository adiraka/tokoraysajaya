<?php

Route::auth();

Route::group(['middleware' => ['web']], function () {

	Route::get('/', [
		'uses' => '\BookApp\Http\Controllers\WelcomeController@index',
		'as' => 'welcome',
		'middleware' => ['guest'],
	]);

	Route::get('/beranda', [
		'uses' => '\BookApp\Http\Controllers\BerandaController@index',
		'as' => 'beranda',
		'middleware' => ['auth'],
	]);

});
