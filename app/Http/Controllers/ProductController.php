<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Category;

class ProductController extends Controller
{
    public function index()
	{
		$products = Product::all();
		return view('products.index', compact('products'));
    }
	
    public function create()
	{
		$categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
	{
		$this->validate($request, [
			'category' => 'required',
			'name' => 'required',
			'description' => 'required',
			'stock' => 'required|numeric'
		], [
			'name.required' => 'Field nama tidak boleh kosong',
			'name.min' => 'Field nama minimal 10 karakter'
		]);

		Product::create([
			'category_id' => $request->category,	
			'name' => $request->name,	
			'description' => $request->description,	
			'stock' => $request->stock
		]);

        return redirect()->route('product.index')->with('status', 'Product has been created!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
		$product = Product::find($id);
		$categories = Category::all();
		return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
		$this->validate($request, [
			'category' => 'required',
			'name' => 'required',
			'description' => 'required',
			'stock' => 'required|numeric'
		], [
			'name.required' => 'Field nama tidak boleh kosong',
			'name.min' => 'Field nama minimal 10 karakter'
		]);

		Product::find($id)->update([
			'category_id' => $request->category,
			'name' => $request->name,
			'description' => $request->description,
			'stock' => $request->stock
		]);

		$message = 'Product has been updated!';
        return redirect()->route('product.index')->with('status', $message);
    }

    public function destroy($id)
	{
		Product::find($id)->delete();

		$message = 'Product has been deleted!';
        return redirect()->route('product.index')->with('status', $message);
    }
}
