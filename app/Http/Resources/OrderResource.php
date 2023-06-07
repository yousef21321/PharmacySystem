<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'nameOfMedicine'=>$this->nameOfMedicine,
            'Quantity'=>$this->Quantity,
            'Name'=>$this->Name,
            'PhoneNumber'=>$this->PhoneNumber,
            'Address'=>$this->Address

        ];
    }
}
