<?php

Route::get('/', 'HomeController@index')->name('home');
Route::get('/product', 'ProductController@index')->name('product.index');
Route::get('/product/create', 'ProductController@create')->name('product.create');

Route::resource('category', 'CategoryController');
