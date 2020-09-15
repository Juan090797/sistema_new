<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAreaRequest extends FormRequest
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
            'nombre_area' => 'required|unique:areas,nombre_area,'.$this->area->id.',id',
            'estado_area' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nombre_area.required' => 'El nombre del area es obligatoria',
            'nombre_area.unique' => 'El nombre del area ya esta creado',
            'estado_area.required' => 'El estado del area es obligatoria',
        ];
    }
}
