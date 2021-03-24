<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateproveedoresRequest extends FormRequest
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

            'Id_proveedor.required' => 'La cedula es obligatoria',
            'Id_proveedor.unique' => 'Esta identificacion ya existe',
            'unique' => 'El :attributo ya existe',
            'Nom_proveedor.required' => 'El nombre es obligatorio',
            'Dir_proveedor.required' => 'La dirección es obligatoria',
            'Ciudad.required' => 'La Ciudad es obligatoria',
            'Tel_proveedor.required' => 'El telefono es obligatorio',
            'Cor_proveedor.required' => 'El telefono es obligatorio',
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
            'Id_proveedor'=>'required|unique:proveedores|min:5',
            'Nom_proveedor'=>'required',
            'Dir_proveedor'=>'required',
            'Ciudad'=>'required',
            'Tel_proveedor'=>'required',
            'Cor_proveedor'=>'required',
        ];

    }
}
