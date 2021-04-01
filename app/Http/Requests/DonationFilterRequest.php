<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonationFilterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'from_date' => 'nullable|required_with:to_date|date|before:to_date',
            'to_date' => 'nullable|required_with:from_date|date|before:tomorrow'
        ];
    }

    public function messages()
    {
        return [
            'required_with' => 'Es requerido cuando el otro campo está presente',
            'date' => 'Debe ingresar una fecha',
            'from_date.before' => 'Debe ser previa a la otra fecha',
            'to_date.before' => 'Debe ser hasta el día de hoy',
        ];
    }
}