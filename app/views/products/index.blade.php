@extends('layouts.master')

@section('content')
	@foreach($products as $product)
		<p>{{{$product->name}}}</p>
	@endforeach
@stop