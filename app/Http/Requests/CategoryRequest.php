<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        'name' => "required|string|max:50",
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nombre',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Debe completar el campo :attribute',
            'string' => 'El campo :attribute debe ser una cadena de texto',
            'max' => 'El campo :attribute no debe superar :max caracteres',
        ];
    }
}
