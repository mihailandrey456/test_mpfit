@extends('layout')

@section('main')
	<h1>Просмотр товара</h1>

	<div>
		<a href="{{ route('products.index') }}">Назад</a>
	</div>

	<div>
		<form action="{{ route('products.edit', $product) }}">
			<button>Редактировать</button>
		</form>
		<form method="post" action="{{ route('products.destroy', $product) }}">
			@method('delete')
			@csrf
			<button>Удалить</button>
		</form>
	</div>

	<div>
		<div>Название: {{ $product->name }}</div>
		<div>Категория: {{ $product->category }}</div>
		<div>Цена: {{ $product->price }}</div>
		<div>Комментарий: {{ empty($product->comment) ? 'Отсутствует' : $product->comment }}</div>
	</div>
@endsection