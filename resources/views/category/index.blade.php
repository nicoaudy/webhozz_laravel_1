@extends('layouts.main')

@section('title', 'Category Page')

@section('section-title', 'Category Section Title')

@section('content')
	<a class="btn btn-success" href="{{ route('category.create') }}" style="margin-bottom: 10px">Create New Category 👷</a>

	@if(session()->has('status'))
		<div class="alert alert-primary" role="alert">
			{{ session()->get('status') }}
		</div>
	@endif

	<table class="table table-hover table-bordered">
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Description</th>
			<th>Action</th>
		</tr>
		@foreach($categories as $row)
		<tr>
			<td>{{ $loop->iteration }}</td>
			<td>{{ $row->name }}</td>
			<td>{{ $row->description }}</td>
			<td>
				<a class="btn btn-info" href="">Edit</a>
				<a class="btn btn-danger" href="">Delete</a>
			</td>
		</tr>
		@endforeach
	</table>
@endsection
