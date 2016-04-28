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

	Route::get('/buku', [
		'uses' => '\BookApp\Http\Controllers\BukuController@index',
		'as' => 'buku',
		'middleware' => ['auth'],
	]);

	Route::get('/databuku', [
		'uses' => '\BookApp\Http\Controllers\BukuController@getDataBuku',
		'as' => 'databuku',
		'middleware' => ['auth'],
	]);

});
