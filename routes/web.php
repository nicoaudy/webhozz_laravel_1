<?php

Route::get('/', 'HomeController@index')->name('home');

Route::resource('category', 'CategoryController');
Route::resource('product', 'ProductController');
