<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTicketRequest extends FormRequest
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
            'titulo_tk' => 'required|unique:tickets',
            'descripcion_tk' => 'required',
            // 'estado_tk' => 'required',
            // 'tipo_id' => 'required',
            // 'categoria_id' => 'required',
            // 'prioridad_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'titulo_tk.required' => 'El titulo del ticket es obligatorio',
            'descripcion_tk.required' => 'La descripcion del ticket es obligatorio',
            // 'estado_tk.required' => 'El estado del ticket es obligatorio',
            // 'tipo_id.required' => 'El tipo de ticket es obligatorio',
            // 'categoria_id.required' => 'La categoria del ticket es obligatorio',
            // 'prioridad_id.required' => 'La prioridad del ticket es obligatorio',
        ];
    }
}
