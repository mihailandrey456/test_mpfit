<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Models\Product;
use App\Models\Order;
use App\Services\OrderService;
use Exception;

class OrderController extends Controller
{
	
	function __construct(private readonly OrderService $service)
	{
	}

	public function index()
	{
		return view('orders.index', [
			'orders' => Order::all()
		]);
	}

	public function create()
	{
		return view('orders.create', [
			'products' => Product::all()
		]);
	}

	public function store(CreateOrderRequest $request)
	{
		try {
			$this->service->createOrder($request->toDto());
		} catch (Exception $e) {
			return redirect(route('orders.create'));
		}
		return redirect(route('orders.index'));
	}

	public function show(Order $order)
	{
		return view('orders.show', [
			'order' => $order
		]);
	}

	public function complete(Order $order)
	{
		try {
			$this->service->completeOrder($order);
		} catch (Exception $e) {
			return redirect(route('orders.show', $order));
		}
		return redirect(route('orders.index'));
	}
}