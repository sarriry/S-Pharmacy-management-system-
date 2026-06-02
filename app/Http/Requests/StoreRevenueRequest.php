<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRevenueRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'total_order' => ['required', 'numeric'],
            'total_revenue' => ['required', 'numeric'],
            'pharmacy_id' => ['required', 'integer', 'exists:pharmacies,pharmacy_id'],
        ];
    }

    public function messages(): array
    {
        return [
            'total_order' => [
                'required' => 'The Total Order is Required',
                'numeric' => 'The Total Order must be Numeric',
            ],
            'total_revenue' => [
                'required' => 'The Total Revenue is Required',
                'numeric' => 'The Total Revenue must be Numeric',
            ],
            'pharmacy_id' => [
                'required' => 'The Pharmacy ID is Required',
                'integer' => 'The Pharmacy ID must be Integer Number',
                'exists' => 'The Pharmacy ID does not exist'
            ],

        ];
    }
}
