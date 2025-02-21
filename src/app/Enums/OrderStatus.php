<?php

namespace App\Enums;

enum OrderStatus: int
{
	case NEW = 0;

	case COMPLETED = 1;

	public function label(): string
	{
		return match ($this) {
			self::NEW => 'Новый',
			self::COMPLETED => 'Выполнен',
		};
	}
}