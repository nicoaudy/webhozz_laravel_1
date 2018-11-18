@extends('layouts.main')

@section('content')
	@include('errors.errors_message')
	<div class="row">
		<div class="col-md-6">
			<form action="{{ route('product.store') }}" method="POST">
				@csrf
				<div class="form-group">
					<label>Category</label>
					<select name="category" class="form-control">
						<option value="">--Please Select--</option>
						@foreach($categories as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label>Name</label>
					<input type="text" class="form-control" name="name" placeholder="Enter product name">
				</div>
				<div class="form-group">
					<label>Stock</label>
					<input type="number" class="form-control" name="stock" placeholder="eg: 10">
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
