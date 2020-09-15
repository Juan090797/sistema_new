<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePrioridadRequest extends FormRequest
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
            'nombre_pri' => 'required|unique:prioridades_tk',
            'estado_pri' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nombre_pri.required' => 'El nombre de la prioridad es obligatoria',
            'estado_pri.required' => 'El estado de la prioridad es obligatoria',
        ];
    }
}
