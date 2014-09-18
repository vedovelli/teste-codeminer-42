<?php

Route::get('/', function() {

	return Redirect::to('/product');
});

Route::get('/product', 'ProductsController@index');
Route::get('/product/remove/{id}', 'ProductsController@destroy');
Route::get('/product/edit/{id}', 'ProductsController@edit');
Route::post('/product/update', array('before' => 'csrf', 'uses' => 'ProductsController@update'));
Route::get('/file', 'FileController@index');
Route::post('/file/upload', 'FileController@upload');