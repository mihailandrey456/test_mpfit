<?php

namespace App\Dto;

final class CreateOrderDto
{
	function __construct(
		public readonly string $consumerName,
		public readonly int $productId,
		public readonly int $count,
		public readonly string $comment,
	)
	{
	}
}