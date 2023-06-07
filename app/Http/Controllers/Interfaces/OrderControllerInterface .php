<?php
namespace App\Http\Controllers\Interfaces;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Interfaces\AuthenticatedControllerInterface;

interface OrderControllerInterface extends AuthenticatedControllerInterface
{
    public function index();
    public function create();
    public function store(Request $request);
    public function show(Order $order);
    public function update(Request $request, Order $order);
    public function destroy(Order $order);

}
