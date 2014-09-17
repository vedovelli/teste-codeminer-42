<?php

Route::get('/', function()
{
	return View::make('hello');
});


Route::get('/file', 'FileController@index');
Route::post('/file/upload', 'FileController@upload');