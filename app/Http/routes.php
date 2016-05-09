<?php

Route::auth();

Route::group(['middleware' => ['web']], function () {

	Route::get('/', [
		'uses' => '\BookApp\Http\Controllers\WelcomeController@index',
		'as' => 'welcome',
		'middleware' => ['guest'],
	]);

	// Route Beranda

	Route::get('/beranda', [
		'uses' => '\BookApp\Http\Controllers\BerandaController@index',
		'as' => 'beranda',
		'middleware' => ['auth'],
	]);

	// Route Buku

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

	Route::post('/bukus', [
		'uses' => '\BookApp\Http\Controllers\BukuController@addDataBuku',
		'middleware' => ['auth'],
	]);

	Route::get('/bukus/{id}', [
		'uses' => '\BookApp\Http\Controllers\BukuController@getDetailDataBuku',
		'middleware' => ['auth'],
	]);

	Route::delete('/bukus/{id}', [
		'uses' => '\BookApp\Http\Controllers\BukuController@deleteDataBuku',
		'middleware' => ['auth'],
	]);

	Route::put('/bukus/{id}', [
		'uses' => '\BookApp\Http\Controllers\BukuController@editDataBuku',
		'middleware' => ['auth'],
	]);

	// Route Kategori

	Route::get('/kategori', [
		'uses' => '\BookApp\Http\Controllers\KategoriController@index',
		'as' => 'kategori',
		'middleware' => ['auth'],
	]);

	Route::get('/datakategori', [
		'uses' => '\BookApp\Http\Controllers\KategoriController@getDataKategori',
		'as' => 'datakategori',
		'middleware' => ['auth'],
	]);

	Route::post('/kategoris', [
		'uses' => '\BookApp\Http\Controllers\KategoriController@addDataKategori',
		'middleware' => ['auth'],
	]);

	Route::get('/kategoris/{id}', [
		'uses' => '\BookApp\Http\Controllers\KategoriController@getDetailDataKategori',
		'middleware' => ['auth'],
	]);

	Route::delete('/kategoris/{id}', [
		'uses' => '\BookApp\Http\Controllers\KategoriController@deleteDataKategori',
		'middleware' => ['auth'],
	]);

	Route::put('/kategoris/{id}', [
		'uses' => '\BookApp\Http\Controllers\KategoriController@editDataKategori',
		'middleware' => ['auth'],
	]);

	Route::post('/kategori/cari', [
		'uses' => '\BookApp\Http\Controllers\KategoriController@getListKategori',
		'as' => 'carikategori',
		'middleware' => ['auth'],
	]);

});
