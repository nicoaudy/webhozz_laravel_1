@extends('layouts.main')

@section('title', 'Product Page')

@section('section-title', 'Product Section Title')

@section('content')
	<a class="btn btn-success" href="{{ route('product.create') }}" style="margin-bottom: 10px">Create New Product 👷</a>

	@if(session()->has('status')) <div class="alert alert-primary" role="alert">
			{{ session()->get('status') }}
		</div>
	@endif

	<table class="table table-hover table-bordered">
		<tr>
			<th>#</th>
			<th>Category</th>
			<th>Name</th>
			<th>Description</th>
			<th>Stock</th>
			<th>Action</th>
		</tr>
		@foreach($products as $row)
		<tr>
			<td>{{ $loop->iteration }}</td>
			<td>{{ $row->category->name }}</td>
			<td>{{ $row->name }}</td>
			<td>{{ $row->description }}</td>
			<td>{{ $row->stock }}</td>
			<td>
				<a class="btn btn-info" href="{{ route('product.edit', $row->id) }}">Edit</a>
				<a href="{{ route('product.destroy', $row->id) }}" class="btn btn-danger" data-method="delete" data-token="{{ csrf_token() }}" data-confirm="Are you sure?">Delete</a>
			</td>
		</tr>
		@endforeach
	</table>
@endsection
