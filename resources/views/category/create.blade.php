@extends('layouts.main')

@section('content')
	@include('errors.errors_message')
	<div class="row">
		<div class="col-md-6">
			<form action="{{ route('category.store') }}" method="POST">
				@csrf
				<div class="form-group">
					<label>Name</label>
					<input type="text" class="form-control" name="name" placeholder="Enter category name">
				</div>
				<div class="form-group">
					<label>Description</label>
					<textarea class="form-control" name="description"></textarea>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
@endsection
