<?php

Auth::routes();

Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('/logout', 'Auth\LoginController@logout');

# Protected url must be logged in.
Route::middleware('auth')->group(function(){ 
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('category', 'CategoryController');
	Route::resource('product', 'ProductController');
});
