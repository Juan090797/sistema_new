<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAreaRequest extends FormRequest
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
            'nombre_area' => 'required|unique:areas',
            'estado_area' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nombre_area.required' => 'El nombre del area es obligatoria',
            'estado_area.required' => 'El estado del area es obligatoria',
        ];
    }
}
