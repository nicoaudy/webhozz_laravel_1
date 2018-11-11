<?php

Route::get('/', function(){
	return view('layouts.main');
});

Route::get('/product', function(){
	return view('product.index');
});
