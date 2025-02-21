@extends('layout')

@section('main')
	<h1>Список заказов</h1>

	<div>
		<a href="{{ route('orders.create') }}">Создать заказ</a>
	</div>

	<ul>
	@foreach($orders as $order)
		<li>
			<a href="{{ route('orders.show', $order) }}">{{ $order->shortDescription() }}</a>
		</li>
	@endforeach
	</ul>
@endsection