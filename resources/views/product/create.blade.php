@extends('layouts.main')

@section('title')
	Create Product
@endsection

@section('section-title')
	Create Product
@endsection

@section('content')
<form>
	<div class="form-group">
		<label for="name">Product Name</label>
		<input type="text" name="name" class="form-control" placeholder="Product Name...">
	</div>
	<div class="form-group">
		<label for="quantity">Quantity</label>
		<select name="quantity" class="form-control">
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
		</select>
	</div>
	<div class="form-group">
		<button class="btn btn-primary">Submit</button>
	</div>
</form>
@endsection
