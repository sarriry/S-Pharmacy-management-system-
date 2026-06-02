<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MedicineResource extends JsonResource
{

    public function toArray($request)
    {
        return [

            'name' => $this->name,
            'type' => $this->type,
            'quantity'=>$this->pivot->quantity,
            'total_price'=>($this->pivot->quantity * $this->price)
        ];
    }
}
