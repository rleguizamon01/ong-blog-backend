<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubscriberRequest extends FormRequest
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
        if ($this->getMethod() == 'POST') {
            return [
                'first_name' => 'required|string|min:2|max:100',
                'last_name' => 'required|string|min:2|max:100',
                'email' => 'required|email|unique:subscribers',
            ];
        } else {
            return [
                'first_name' => 'required|string|min:2|max:100',
                'last_name' => 'required|string|min:2|max:100',
                'email' => [
                    'required',
                    'email',
                    Rule::unique('subscribers')->ignore(request()->route('subscriber')->id),
                ],
            ];
        }
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'first_name' => 'Nombre',
            'last_name' => 'Apellido',
            'email' => 'Email',
        ];
    }


    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'Debe completar el campo :attribute',
            'string' => 'El campo :attribute debe ser una cadena de caracteres',
            'min' => 'El campo :attribute debe tener al menos :min caracteres',
            'max' => 'El campo :attribute debe tener como maximo :max caracteres',
            'email.unique' => 'Ese email ya está siendo utilizado, por favor ingrese otro',
            'email.email' => 'Debe ingresar un email valido',
        ];
    }
}
