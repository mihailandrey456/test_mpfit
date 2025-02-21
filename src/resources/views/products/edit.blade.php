@extends('layout')

@section('main')
	<h1>Редактирование товара</h1>

	<div>
		<a href="{{ route('products.show', $product) }}">Назад</a>
	</div>

	<form method="post" action="{{ route('products.update', $product) }}">
		@method('put')
		@csrf

		<div>
			<label for="name">Название: </label>
			<input type="text" name="name" id="name" required value="{{ $product->name }}" />
			@error('name')<div>{{ $message }}</div>@enderror
		</div>

		<div>
			<label for="category">Категория: </label>
			<select name="category_id" id="category">
				@foreach($categories as $category)
					<option value="{{ $category->id }}"
						@if($category->id === $product->category_id) selected @endif
					>
						{{ $category->name }}
					</option>
				@endforeach
			</select>
			@error('category_id')<div>{{ $message }}</div>@enderror
		</div>

		<div>
			<label for="price">Цена: </label>
			<input type="text" name="price" id="price" required value="{{ $product->price }}" />
			@error('price')<div>{{ $message }}</div>@enderror
		</div>

		<div>
			<label for="comment">Комментарий: </label>
			<textarea name="comment" id="comment">{{ $product->comment }}</textarea>
			@error('comment')<div>{{ $message }}</div>@enderror
		</div>

		<button type="submit">Обновить</button>
	</form>
@endsection