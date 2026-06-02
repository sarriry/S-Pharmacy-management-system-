<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddressRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            
            'area_id' => ['required', 'exists:areas,id'], //
            'street_name' => ['required', 'string'],
            'building_number' => ['required', 'numeric'],
            'floor_number' => ['required', 'numeric'],
            'flat_number' => ['required', 'numeric'],
        ];
    }

public function messages(): array
{
    return [
        'area_id.required' => 'The Area ID is Required',
        'area_id.exists' => 'The Area ID does not exist',

        'street_name.required' => 'The Street Name is Required',
        'street_name.string' => 'The Street Name must be a String',

        'building_number.required' => 'The Building Number is Required',
        'building_number.numeric' => 'The Building Number must be a Number',

        'floor_number.required' => 'The Floor Number is Required',
        'floor_number.numeric' => 'The Floor Number must be a Number',

        'flat_number.required' => 'The Flat Number is Required',
        'flat_number.numeric' => 'The Flat Number must be a Number',
    ];
}
    }

