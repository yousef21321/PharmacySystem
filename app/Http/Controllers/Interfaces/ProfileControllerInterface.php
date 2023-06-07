<?php

namespace App\Http\Controllers\Interfaces;

use Illuminate\Http\Request;
use App\Http\Controllers\Interfaces\AuthenticatedControllerInterface;

interface ProfileControllerInterface extends AuthenticatedControllerInterface
{
    public function index(): \Illuminate\View\View;

    public function update(Request $request);
}
