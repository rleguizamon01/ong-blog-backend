<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'amount' => 'required|numeric'
        ];
    }

    public function attributes()
    {
        return [
            'amount' => 'monto',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Debe completar el campo :attribute',
            'email' => 'Debe ingresar un email válido',
            'numeric' => 'El campo :attribute debe ser numérico'
        ];
    }
}
