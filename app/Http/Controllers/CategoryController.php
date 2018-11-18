<?php

namespace App\Http\Controllers;

use App\Product;
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
			'slug' => str_slug($request->name),
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
		$category = Category::find($id);
		return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
		# Validation
		$this->validate($request, [
			'name' => 'required|min:10',
			'description' => 'required'	
		], [
			'name.required' => 'Field nama tidak boleh kosong',
			'name.min' => 'Field nama minimal 10 karakter'
		]);

		# Do update
		Category::find($id)->update([
			'name' => $request->name,
			'slug' => str_slug($request->name),
			'description' => $request->description	
		]);

		# redirect with flash
		$message = 'Category has been updated!';
        return redirect()->route('category.index')->with('status', $message);
    }

    public function destroy($id)
	{
		Product::where('category_id', $id)->delete();
		Category::find($id)->delete();

		# redirect with flash
		$message = 'Category has been deleted!';
        return redirect()->route('category.index')->with('status', $message);
    }
}
