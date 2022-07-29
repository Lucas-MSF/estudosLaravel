<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nome' => 'required|min:3|max:255'
        ];
    }
    public function messages()
    {
        return [
            'required'=> 'O campo :attribute é obrigatorio!',
            'min' => 'O campo :attribute precisa ter no minimo 3 caracteres!',
            'max' => 'O campo :attribute suporta somente 255 caracteres'
        ];
    }
}
