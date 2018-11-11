<?php

Route::get('/', 'HelloController@index');

Route::get('hello/{name}', function($name){
	return 'Hello ' . $name;
});

Route::get('hello/controller/{name}', 'HelloController@show');
Route::get('hello/name/{name}/umur/{age?}', 'HelloController@withCondition');

Route::get('first', function(){
	return 'ini route pertama';	
})->name('first.route');

Route::get('kedua', function(){
	return redirect()->route('first.route');
});

// Route::get('hello/name/{name}/umur/{age?}', function($name, $age = null) {
// 	if($age == null) {
// 		return 'Umur anda kosong. Isi dong!';
// 	}
// 	return "Hello nama saya {$name} umur saya {$age}";
// });
