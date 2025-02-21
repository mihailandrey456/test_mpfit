@extends('layout')

@section('main')
	<h1>Создание товара</h1>

	<div>
		<a href="{{ route('products.index') }}">Назад</a>
	</div>

	<form method="post" action="{{ route('products.store') }}">
		@csrf

		<div>
			<label for="name">Название: </label>
			<input type="text" name="name" id="name" required value="{{ old('name') }}" />
			@error('name')<div>{{ $message }}</div>@enderror
		</div>

		<div>
			<label for="category">Категория: </label>
			<select name="category_id" id="category">
				@foreach($categories as $category)
					<option value="{{ $category->id }}">{{ $category->name }}</option>
				@endforeach
			</select>
			@error('category_id')<div>{{ $message }}</div>@enderror
		</div>

		<div>
			<label for="price">Цена: </label>
			<input type="text" name="price" id="price" required value="{{ old('price') }}" />
			@error('price')<div>{{ $message }}</div>@enderror
		</div>

		<div>
			<label for="comment">Комментарий: </label>
			<textarea name="comment" id="comment"></textarea>
			@error('comment')<div>{{ $message }}</div>@enderror
		</div>

		<button type="submit">Создать</button>
	</form>
@endsection