@extends('layout')

@section('main')
	<h1>Список товаров</h1>

	<div>
		<a href="{{ route('products.create') }}">Создать товар</a>
	</div>

	<ul>
	@foreach($products as $product)
		<li>
			<a href="{{ route('products.show', $product) }}">{{ $product->shortDescription() }}</a>
		</li>
	@endforeach
	</ul>
@endsection