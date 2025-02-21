<?php

namespace App\Models;

use App\Enums\OrderStatus;
use App\Vo\Price;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;


/**
 * @property int $id
 * @property string $consumer_name
 * @property OrderStatus $status
 * @property string $comment
 * @property Carbon $created_at
 * @property Product $product
 * @property int $count
 */
class Order extends Model
{
	const UPDATED_AT = null;

	protected function status(): Attribute
	{
		return Attribute::make(
            get: fn (int $status) => OrderStatus::from($status),
            set: fn (OrderStatus $status) => $status->value,
        );
	}

	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	public function shortDescription(): string
	{
		return sprintf("%d | %s | %s | %s | %s руб.", 
			$this->id,
			$this->created_at, 
			$this->consumer_name, 
			$this->status->label(),
			$this->totalPrice(),
		);
	}

	public function totalPrice(): Price
	{
		return $this->product->price->multiple($this->count);
	}
}