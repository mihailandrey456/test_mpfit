<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\ProductService;
use Exception;

class ProductController extends Controller
{
	
	function __construct(private readonly ProductService $service)
	{
	}

	public function index()
	{
		return view('products.index', [
			'products' => Product::all()
		]);
	}

	public function create()
	{
		return view('products.create', [
			'categories' => Category::all()
		]);
	}

	public function store(SaveProductRequest $request)
	{
		try {
			$this->service->createProduct($request->toDto());
		} catch (Exception $e) {
			return redirect(route('products.create'));
		}
		return redirect(route('products.index'));
	}

	public function show(Product $product)
	{
		return view('products.show', [
			'product' => $product
		]);
	}

	public function edit(Product $product)
	{
		return view('products.edit', [
			'product' => $product,
			'categories' => Category::all()
		]);
	}

	public function update(Product $product, SaveProductRequest $request)
	{
		try {
			$this->service->updateProduct($product, $request->toDto());
		} catch (Exception $e) {
			return redirect(route('products.edit', $product));
		}
		return redirect(route('products.index'));
	}

	public function destroy(Product $product)
	{
		try {
			$this->service->deleteProduct($product);
		} catch (Exception $e) {
		}
		return redirect(route('products.index'));
	}
}