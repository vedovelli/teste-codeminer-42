<?php

Route::get('/', function() {

	return Redirect::to('/products');
});

Route::get('/products', 'ProductsController@index');
Route::get('/products/remove/{id}', 'ProductsController@destroy');
Route::get('/products/edit/{id}', 'ProductsController@edit');
Route::post('/products/update', array('before' => 'csrf', 'uses' => 'ProductsController@update'));
Route::get('/file', 'FileController@index');
Route::post('/file/upload', 'FileController@upload');