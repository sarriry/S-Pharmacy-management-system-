<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            /*
             * Existing client OR manual client
             */
            'client_mode' => ['nullable', Rule::in(['existing', 'new'])],

            'user_id' => ['nullable', 'exists:users,id'],

            'client_name' => ['nullable', 'required_without:user_id', 'string', 'max:255'],
            'client_email' => ['nullable', 'email', 'max:255'],
            'client_phone' => ['nullable', 'string', 'max:255'],
            'client_gender' => ['nullable', Rule::in(['Male', 'Female'])],
            'client_date_of_birth' => ['nullable', 'date'],

            /*
             * No address validation here.
             * Removed:
             * delivering_address_id
             * area_id
             * street_name
             * building_no
             * floor_number
             * flat_number
             */

            'pharmacy_id' => ['nullable', 'exists:pharmacies,id'],
            'doctor_id' => ['nullable', 'exists:doctors,id'],

            'status' => [
                'required',
                Rule::in([
                    'New',
                    'Processing',
                    'WaitingForUserConfirmation',
                    'Canceled',
                    'Confirmed',
                    'Delivered',
                ]),
            ],

            'creator_type' => [
                'required',
                Rule::in(['client', 'doctor', 'pharmacy']),
            ],

            'medicine_id' => ['required', 'array', 'min:1'],
            'medicine_id.*' => ['required', 'exists:medicines,id'],

            'quantity' => ['required', 'array', 'min:1'],
            'quantity.*' => ['required', 'integer', 'min:1'],
        ];
    }

    public function messages()
    {
        return [
            'client_name.required_without' => 'Please select an existing client or enter a new client name.',
            'status.required' => 'Status is required.',
            'creator_type.required' => 'Creator type is required.',
            'medicine_id.required' => 'Please select at least one medicine.',
            'quantity.required' => 'Please enter quantity for selected medicines.',
        ];
    }
}