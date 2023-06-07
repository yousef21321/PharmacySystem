<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ProfileResource;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Interfaces\ProfileControllerInterface;

class ProfileController extends Controller
{
    use ApiResponseTrait;

    protected $profile;

    public function __construct(Profile $profile)
    {
        $this->profile = $profile;
    }

    public function index()
    {
        $profiles = ProfileResource::collection($this->profile->get());
        return $this->apiResponse($profiles, 'Profiles retrieved successfully', 200);
    }

    public function show($id)
    {
        $Profile = $this->profile->findOrFail($id);
        if ($Profile) {
            return $this->apiResponse(new ProfileResource($Profile), 'Medicine retrieved successfully', 200);
        }
        return $this->apiResponse(null, 'Medicine retrieved not found', 400);
    }
    public function update(Request $request, $id)
    {
        $profile = $this->profile->findOrFail($id);

        if ($request->has('email')) {
            $profile->email = $request->input('email');
        }
        if ($request->has('name')) {
            $profile->name = $request->input('name');
        }
        if ($request->has('health_condition')) {
            $profile->health_condition = $request->input('health_condition');
        }
        if ($request->has('address')) {
            $profile->address = $request->input('address');
        }
        if ($request->has('phone_number')) {
            $profile->phone_number = $request->input('phone_number');
        }
        if ($request->has('age')) {
            $profile->age = $request->input('age');
        }
        if ($request->has('gender')) {
            $profile->gender = $request->input('gender');
        }

        $profile->save();
        return $this->apiResponse($profile, 'Profile updated successfully', 200);
    }


}
