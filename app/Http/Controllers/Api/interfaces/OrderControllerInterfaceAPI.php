<?php

namespace App\Http\Controllers\Interfaces;
use App\Http\Controllers\Interfaces\AuthenticatedControllerInterface;
use Illuminate\Http\Request;

interface OrderControllerInterfaceAPI extends AuthenticatedControllerInterface
{
    public function index();

    public function store(Request $request);
}
