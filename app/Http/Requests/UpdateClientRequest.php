<?php

namespace App\Http\Requests;

use App\Models\Client;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClientRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => ['required', 'min:3'], //
            'email' => ['required', 'email',  Rule::unique('users', 'email')->ignore($this->user_id)], //
            'gender' => ['required', 'in:Male,Female'], //
            'date_of_birth' => ['required', 'date'], //
            'avatar_image' => ['image', 'mimes:jpeg,png', 'max:2048'], //
            'phone' => ['required', 'regex:/^01[0-1-2-5]\d{10}$/'], //
            'email_verified_at' => ['nullable', 'date_format:Y-m-d H:i:s']
        ];
    }
}
