<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
	# method index di pake untuk listing data
    public function index()
	{
		// bikin variabel, untuk list data dari database
		$categories = Category::all();

		// kirim variabel ke view menggunakan compact
		return view('category.index', compact('categories'));
    }
	
	# untuk tampilin form create data
    public function create()
    {
        return view('category.create');
    }

	# action dari form create
    public function store(Request $request)
	{
		# Validation
		$this->validate($request, [
			'name' => 'required|min:10',
			'description' => 'required'	
		], [
			'name.required' => 'Field nama tidak boleh kosong',
			'name.min' => 'Field nama minimal 10 karakter'
		]);

		# 1. Insert to database
		Category::create([
			'name' => $request->name,	
			'description' => $request->description,	
		]);

		# Redirect to index page
        return redirect()->route('category.index')->with('status', 'Category has been created!');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
