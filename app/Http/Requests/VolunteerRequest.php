<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VolunteerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|unique:volunteers',
            'phone_number' => 'required|numeric|max:15',
            'birthdate' => 'required|date|before:today',
            'body' => 'required|max:500|string',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Debe completar el campo :attribute',
            'min' => 'El campo :attribute debe tener al menos :min caracteres',
            'max' => 'El campo :attribute no debe superar :max caracteres',
            'string' => 'El campo :attribute debe ser una cadena de caracteres',
            'numeric' => 'El campo :attribute debe ser un número',
            'date' => 'El campo :attribute debe ser una fecha',
            'before' => 'La fecha debe ser anterior a hoy',
            'unique' => 'El :attribute ya se encuentra registrado'
        ];
   }
}
