<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Interfaces\OrderControllerInterface;

class OrderController extends Controller
{

    public function __construct()
    {
        //To make the website secure
        $this->middleware('auth');
    }

    public function index()
    {
        $order = Order::all();
        return view('orders.index', compact('order'));
    }
    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nameOfMedicine' => 'required|string',
            'Quantity' => 'required|numeric',
            'Name' => 'required|string',
            'PhoneNumber' => 'required|string',
            'Address' => 'required|string',
        ]);

        $order = Order::create([
            'user_id' => auth()->id(),
            'nameOfMedicine' => $validatedData['nameOfMedicine'],
            'Quantity' => $validatedData['Quantity'],
            'Name' => $validatedData['Name'],
            'PhoneNumber' => $validatedData['PhoneNumber'],
            'Address' => $validatedData['Address'],
        ]);

        return redirect()->back();
    }

    public function show(order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nameOfMedicine' => 'required|string',
            'Quantity' => 'required|numeric',
            'Name' => 'required|string',
            'PhoneNumber' => 'required|string',
            'Address' => 'required|string',
        ]);

        $order = Order::findOrFail($id);
        $order->update($validatedData);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->back();
    }
}
