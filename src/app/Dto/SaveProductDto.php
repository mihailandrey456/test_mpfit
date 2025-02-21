<?php

namespace App\Dto;

use App\Vo\Price;

final class SaveProductDto
{
	function __construct(
		public readonly string $name,
		public readonly int $categoryId,
		public readonly string $comment,
		public readonly Price $price
	)
	{
	}
}