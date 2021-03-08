<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'category_id' => 'required',
            'title' => "required|string|min:1|max:100",
            'body' => "required|string|min:1",
            "photo" => "image"
        ];
    }

    public function attributes()
{
    return [
        'category_id' => 'categoria',
        'title' => 'título',
        'body' => 'cuerpo',
        'photo' => 'imagen'
    ];
}

    public function messages()
    {
        return [
            'required' => 'Debe completar el campo :attribute',
            'category_id.required' => 'Debe seleccionar una categoria',
            'min' => 'El campo :attribute debe tener al menos :min caracteres',
            'max' => 'El campo :attribute no bebe superar :max caracteres',
            'image' => 'La imagen debe ser de formato .jpg, .png, etc'
        ];
    }
}
