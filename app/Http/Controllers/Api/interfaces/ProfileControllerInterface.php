<?php

namespace App\Http\Controllers\Interfaces;

use Illuminate\Http\Request;

interface ProfileControllerInterface
{
    public function index();
    public function show($id);
    public function update(Request $request, $id);
}
