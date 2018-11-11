<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
	{
		$title = 'Home Page';
		$content = 'Hi, Welcome Home!';

    	return view('home', compact('title', 'content'));
    }
}