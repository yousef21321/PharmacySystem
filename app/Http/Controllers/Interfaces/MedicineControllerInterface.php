<?php

namespace App\Http\Controllers\Interfaces;

use Illuminate\Http\Request;

interface MedicineControllerInterface
{
    public function index();

    public function store(Request $request);

    public function show($id);

    public function update(Request $request, $id);

    public function destroy($id);
}
