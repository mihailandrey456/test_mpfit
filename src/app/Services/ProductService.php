<?php

namespace App\Services;

use App\Dto\SaveProductDto;
use App\Models\Product;

final class ProductService
{
	public function createProduct(SaveProductDto $request): void
	{
		$product = new Product();
		$product->name = $request->name;
		$product->category_id = $request->categoryId;
		$product->comment = $request->comment;
		$product->price = $request->price;
		$product->saveOrFail();
	}

	public function updateProduct(Product $product, SaveProductDto $request): void
	{
		$product->name = $request->name;
		$product->category_id = $request->categoryId;
		$product->comment = $request->comment;
		$product->price = $request->price;
		$product->saveOrFail();
	}

	public function deleteProduct(Product $product)
	{
		$product->deleteOrFail();
	}
}