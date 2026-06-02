<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{

    public function toArray($request)
    { 
        return [
                'id' => $this->id,
                'name' => $this->user->name,
                'email' => $this->user->email,
                'data_of_birth' => $this->date_of_birth,
                'gender' => $this->gender,
                'phone' => $this->phone,
        ];
    }
}
