@php
	use App\Enums\OrderStatus;
@endphp

@extends('layout')

@section('main')
	<h1>Просмотр заказа</h1>

	<div>
		<a href="{{ route('orders.index') }}">Назад</a>
	</div>

	<div>
		@if($order->status === OrderStatus::NEW)
		<form  method="post" action="{{ route('orders.complete', $order) }}">
			@csrf
			<button>Завершить заказ</button>
		</form>
		@endif
	</div>

	<div>
		<div>Номер заказа: {{ $order->id }}</div>
		<div>Дата создания: {{ $order->created_at }}</div>
		<div>ФИО покупателя: {{ $order->consumer_name }}</div>
		<div>Статус заказа: {{ $order->status->label() }}</div>
		<div>Товар: {{ $order->product->shortDescription() }}</div>
		<div>Количество: {{ $order->count }}</div>
		<div>Итоговая цена: {{ $order->totalPrice() }}</div>
		<div>Комментарий: {{ empty($order->comment) ? 'Отсутствует' : $order->comment }}</div>
	</div>
@endsection