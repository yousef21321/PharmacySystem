<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Interfaces\OrderControllerInterfaceAPI;
use App\Http\Resources\OrderResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    use ApiResponseTrait;

    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function index()
    {
        $order =  OrderResource::collection(Order::get());
        return $this->apiResponse($order, 'Order retrieved successfully', 200);
    }

    public function store(Request $request)
    {
        $order = $this->order->create($request->all());
        if ($order) {
            return $this->apiResponse(new OrderResource($order), 'ok', 201);
        }
        return $this->apiResponse(null, 'The post was not saved', 404);
    }
}
