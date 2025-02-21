<?php

namespace App\Models;

use App\Vo\Price;
use App\Models\Category;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property Category $category
 * @property string $comment
 * @property Price $price
 */
class Product extends Model
{
	protected function price(): Attribute
	{
		return Attribute::make(
            get: fn (int $price) => new Price($price / 100, $price % 100),
            set: fn (Price $price) => $price->rubles * 100 + $price->kopeck,
        );
	}

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function shortDescription(): string
	{
		return sprintf("%s, %s руб., %s", $this->name, $this->price, $this->category);
	}
}