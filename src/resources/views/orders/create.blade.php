@extends('layout')

@section('main')
	<h1>Создание заказа</h1>

	<div>
		<a href="{{ route('orders.index') }}">Назад</a>
	</div>

	<form method="post" action="{{ route('orders.store') }}">
		@csrf

		<div>
			<label for="consumer_name">ФИО покупателя: </label>
			<input type="text" name="consumer_name" id="consumer_name" required value="{{ old('consumer_name') }}" />
			@error('consumer_name')<div>{{ $message }}</div>@enderror
		</div>

		<div>
			<label for="product">Товар: </label>
			<select name="product_id" id="product">
				@foreach($products as $product)
					<option value="{{ $product->id }}">{{ $product->shortDescription() }}</option>
				@endforeach
			</select>
			@error('product_id')<div>{{ $message }}</div>@enderror
		</div>

		<div>
			<label for="count">Количество: </label>
			<input type="number" min="1" name="count" id="count" required value="{{ old('count') }}" />
			@error('count')<div>{{ $message }}</div>@enderror
		</div>

		<div>
			<label for="comment">Комментарий: </label>
			<textarea name="comment" id="comment"></textarea>
			@error('comment')<div>{{ $message }}</div>@enderror
		</div>
			
		<button type="submit">Создать</button>
	</form>
@endsection