<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<div>
		<a href="{{ route('products.index') }}">Список товаров</a> |
		<a href="{{ route('orders.index') }}">Список заказов</a>
	</div>

	@yield('main')
</body>
</html>