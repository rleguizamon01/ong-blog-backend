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
                'ip' => 'required|ip',
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
                'ip' => 'required|ip',
            ];
        }
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'first_name.required' => 'Debe ingresar su nombre',
            'first_name.string' => 'El nombre debe ser una cadena de caracteres',
            'first_name.min' => 'El nombre debe tener al menos :min caracteres',
            'first_name.max' => 'El nombre debe tener como maximo :max caracteres',
            'last_name.required' => 'Debe ingresar su apellido',
            'last_name.string' => 'El apellido debe ser una cadena de caracteres',
            'last_name.min' => 'El apellido debe tener al menos :min caracteres',
            'last_name.max' => 'El apellido debe tener como maximo :max caracteres',
            'email.required' => 'Debe ingresar su email',
            'email.unique' => 'Ese email ya está siendo utilizado, por favor ingrese otro',
            'email.email' => 'Debe ser un email valido',
            'ip.required' => 'Debe ingresar una direccion ip',
            'ip.ip' => 'Debe ser una ip valida',
        ];
    }
}
