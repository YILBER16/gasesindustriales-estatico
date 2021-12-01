<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateremisionesRequest extends FormRequest
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
    public function messages()
    {
        return [

            'Id_remision.required' => 'El Nº de remision es obligatorio',
            'Id_remision.unique' => 'Este Nº de remision ya existe',
            'empresa.required' => 'La empresa es obligatoria',
            'Fecha_remision.required' => 'La fecha de remision es obligatoria',
            'Id_cliente.required' => 'El cliente es obligatorio',
            'Nom_empleado.required' => 'El nombre del empleado es obligatorio',
            'Id_empleado.required' => 'La identificadion del empleado es obligatoriq',
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Id_remision'=>'required|unique:remisiones',
            'empresa'=>'required',
            'Fecha_remision'=>'required',
            'Id_cliente'=>'required',
            'Nom_empleado'=>'required',
            'Id_empleado'=>'required',
            'prueba'=>'required',
        ];
    }
}
