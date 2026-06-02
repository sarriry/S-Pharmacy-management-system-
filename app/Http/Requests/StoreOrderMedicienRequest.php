<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderMedicienRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'medicine_id' => ['required','exists:medicines,id'],
            'order_id' => ['required','exists:orders,id'],
            'quantity'=> ['required', 'integer'],
        ];
    }
    public function messages()
    {
        return [
            'quantity'=>[
                'required' => 'quantity is required',
                'integer' => 'quantity must be integer',
            ],

        ];
    }
}
