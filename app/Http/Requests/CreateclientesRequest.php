<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateclientesRequest extends FormRequest
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

            'Id_cliente.required' => 'La cedula es obligatoria',
            'Id_cliente.unique' => 'Esta identificacion ya existe',
            'unique' => 'El :attribute ya existe',
            'Nom_cliente.required' => 'El nombre es obligatorio',
            'Dir_cliente.required' => 'La direccion es obligatoria',
            'Tel_cliente.required' => 'El telefono es obligatorio',
            'Ciudad.required' => 'La ciudad es obligatoria',
            'Cor_cliente.required' => 'El correo es obligatorio',
            
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
            'Id_cliente'=>'required|unique:clientes|min:7',
            'Nom_cliente'=>'required',
            'Dir_cliente'=>'required',
            'Tel_cliente'=>'required',
            'Ciudad'=>'required',
            'Cor_cliente'=>'required',
        ];
    }
}
