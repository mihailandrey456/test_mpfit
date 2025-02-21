<?php

namespace App\Services;

use App\Enums\OrderStatus;
use App\Dto\CreateOrderDto;
use App\Models\Order;
use Exception;

final class OrderService
{
	public function createOrder(CreateOrderDto $request): void
	{
		$order = new Order();
		$order->consumer_name = $request->consumerName;
		$order->product_id = $request->productId;
		$order->count = $request->count;
		$order->comment = $request->comment;
		$order->status = OrderStatus::NEW;
		$order->saveOrFail();
	}

	public function completeOrder(Order $order): void
	{
		if ($order->status === OrderStatus::COMPLETED) {
			throw new Exception("Order has already been completed");
		}
		$order->status = OrderStatus::COMPLETED;
		$order->saveOrFail();
	}
}