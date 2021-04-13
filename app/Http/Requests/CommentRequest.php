<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'email' => 'required|email',
            'body' => 'required|max:500'
        ];
    }

    public function attributes()
    {
        return [
            'body' => 'comentario',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Debe completar el campo :attribute',
            'min' => 'El campo :attribute debe tener al menos :min caracteres',
            'max' => 'El campo :attribute no debe superar :max caracteres'
        ];
    }
}
