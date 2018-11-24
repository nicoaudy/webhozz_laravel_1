@extends('layouts.main')

@section('title', 'Category Page')

@section('section-title', 'Category Section Title')

@section('content')
	<a class="btn btn-success" href="{{ route('category.create') }}" style="margin-bottom: 10px">Create New Category 👷</a>

	@if(session()->has('status')) <div class="alert alert-primary" role="alert">
			{{ session()->get('status') }}
		</div>
	@endif

	<table class="table table-hover table-bordered">
		<tr>
			<th>#</th>
			<th>Created By</th>
			<th>Name</th>
			<th>Description</th>
			<th>Action</th>
		</tr>
		@foreach($categories as $row)
		<tr>
			<td>{{ $loop->iteration }}</td>
			<td>{{ optional($row->user)->name }}</td>
			<td>{{ $row->name }}</td>
			<td>{{ $row->description }}</td>
			<td>
				<a class="btn btn-info" href="{{ route('category.edit', $row->id) }}">Edit</a>
				<a href="{{ route('category.destroy', $row->id) }}" class="btn btn-danger" data-method="delete" data-token="{{ csrf_token() }}" data-confirm="Are you sure?">Delete</a>
			</td>
		</tr>
		@endforeach
	</table>
@endsection
