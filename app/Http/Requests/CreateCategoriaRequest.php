<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoriaRequest extends FormRequest
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
            'nombre_cat' => 'required|unique:categorias_tk',
            'estado_cat' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nombre_cat.required' => 'El nombre de la categoria es obligatoria',
            'estado_cat.required' => 'El estado de la categoria es obligatoria',
        ];
    }
}
