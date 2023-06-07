<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'email' =>$this-> email,
            'name' =>$this-> name,
            'health_condition' =>$this->health_condition,
            'address' =>$this-> address,
            'phone_number' =>$this-> phone_number,
            'age' =>$this-> age ,
            'gender' =>$this-> gender ,
        ];
    }
}
