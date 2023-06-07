<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\MedicineResource;
use App\Models\Medicine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Interfaces\MedicineControllerInterface;

class MedicineController extends Controller implements MedicineControllerInterface
{
    use ApiResponseTrait;

    protected $medicine;

    public function __construct(Medicine $medicine)
    {
        $this->medicine = $medicine;
    }

    public function index()
    {
        $medicines = MedicineResource::collection($this->medicine->get());
        return $this->apiResponse($medicines, 'Medicines retrieved successfully', 200);
    }

    public function store(Request $request)
    {
        $medicines = $this->medicine->create($request->all());
        return $this->apiResponse($medicines, 'Medicines retrieved successfully', 200);
    }

    public function show($id)
    {
        $medicine = $this->medicine->findOrFail($id);
        if ($medicine) {
            return $this->apiResponse(new MedicineResource($medicine), 'Medicine retrieved successfully', 200);
        }
        return $this->apiResponse(null, 'Medicine retrieved not found', 400);
    }

    public function update(Request $request, $id)
    {
        $medicine = $this->medicine->findOrFail($id);

        if ($request->has('medicine_name')) {
            $medicine->medicine_name = $request->input('medicine_name');
        }
        if ($request->has('price')) {
            $medicine->price = $request->input('price');
        }
        if ($request->has('description')) {
            $medicine->description = $request->input('description');
        }
        if ($request->hasFile('photo')) {
            $this->validate($request, [
                'photo' => 'required|image',
            ]);

            $newPhotoName = time() . '_' . $request->photo->getClientOriginalName();
            $request->photo->move(public_path('upload/medicine'), $newPhotoName);
            $medicine->photo = 'upload/medicine/' . $newPhotoName;
        }

        $medicine->save();
        return $this->apiResponse($medicine, 'Medicine updated successfully', 200);
    }

    public function destroy($id)
    {
        $medicine = $this->medicine->findOrFail($id);
        $medicine->delete();
        return $this->apiResponse(null, 'Medicine deleted successfully', 200);
    }
}
