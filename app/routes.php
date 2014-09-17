<?php

Route::get('/', function() {

	return Redirect::to('/products');
});

Route::resource('products', 'ProductsController');
Route::get('/file', 'FileController@index');
Route::post('/file/upload', 'FileController@upload');