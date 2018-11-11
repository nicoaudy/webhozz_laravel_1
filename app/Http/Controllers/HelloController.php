<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
	public function index()
	{
		$name = 'John';
		$lastName = 'Doe';

		// return view('welcome', compact('name'));
		return view('welcome', [
			'name' => $name,
			'last_name' => $lastName
		]);
	}

	public function show($name)
	{
		return "Hello from controller {$name}";
	}

	public function withCondition($name, $age = null)
	{
		if($age == null) {
			return 'Umur anda kosong. Isi dong!';
		}
		return "Hello nama saya {$name} umur saya {$age}";
	}
}
