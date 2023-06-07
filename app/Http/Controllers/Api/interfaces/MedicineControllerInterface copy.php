<?php

namespace App\Http\Controllers\Interfaces;

use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Http\Controllers\Interfaces\AuthenticatedControllerInterface;
interface MedicineControllerInterfacecopy extends AuthenticatedControllerInterface
{
    public function index();
    public function create();
    public function store(Request $request);
    public function show(Medicine $medicine);
    // public function edit(Medicine $medicine);
    public function update(Request $request, Medicine $medicine);
    public function destroy(Medicine $medicine);
}
