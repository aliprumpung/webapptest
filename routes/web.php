<?php

Route::get('/', function () {
	return view('welcome');
});
Route::get('user/getHash', 'UserController@getHash');
Route::get('user', 'UserController@index');
Route::get('user/create', 'UserController@create');
Route::get('user/edit/{id}', 'UserController@edit');
Route::get('user/edit_nomodal/{id}', 'UserController@edit_nomodal');
Route::post('user/store', 'UserController@store');
Route::patch('user/update/{id}', 'UserController@update');
Route::delete('user/delete/{id}', 'UserController@destroy');

	

