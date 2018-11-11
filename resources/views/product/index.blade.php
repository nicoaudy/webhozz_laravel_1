@extends('layouts.main')

@section('title')
	Product Page
@endsection

@section('section-title')
	Product Section Page
@endsection

@section('content')
	<a href="{{ route('product.create') }}" class="btn btn-success">Create new product</a><hr>

	@foreach($banyakData as $satuData)
		@if($satuData == 'product-1')
			Product Ke Satu <br>
		@else
			{{ $satuData }} <br>
		@endif
	@endforeach

@endsection
