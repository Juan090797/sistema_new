<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmpresaRequest extends FormRequest
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
            'nombre_empr' => 'required|unique:empresas,nombre_empr,'.$this->empresa->id.',id',
            'estado_empr' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nombre_empr.required' => 'El nombre de la empresa es obligatoria',
            'nombre_empr.unique' => 'El nombre de la empresa ya esta creado',
            'estado_area.required' => 'El estado de la empresa es obligatoria',
        ];
    }
}
