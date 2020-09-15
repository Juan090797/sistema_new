<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTipo_ticketRequest extends FormRequest
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
            'nombre_tip' => 'required|unique:tipos_tk',
            'estado_tip' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nombre_tip.required' => 'El nombre del Tipo de ticket es obligatoria',
            'estado_tip.required' => 'El estado del Tipo de ticket es obligatoria',
        ];
    }
}
