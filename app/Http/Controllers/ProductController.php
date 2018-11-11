<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
	{
		$banyakData = [
			'product-1',		
			'product-2',		
			'product-3',		
			'product-4',		
			'product-5',		
		];

    	return view('product.index', compact('banyakData'));
	}

	public function create()
	{
		return view('product.create');
	}
}
