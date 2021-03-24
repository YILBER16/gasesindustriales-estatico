<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateusersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
public function messages()
    {
        return [

            'id.required' => 'La cedula es obligatoria',
            'id.unique' => 'Esta identificacion ya existe',
            'unique' => 'El :attributo ya existe',
            'name.required' => 'El nombre es obligatorio',
            'correo.required' => 'El correo es obligatorio',
            'correo.required' => 'El correo es obligatorio',
            'rol.required' => 'El rol es obligatorio',
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
            'id'=>'required|unique:users|min:5',
            'name'=>'required',
            'correo'=>'required',
            'Tel_proveedor'=>'required',
            'Cor_proveedor'=>'required',
        ];

    }
}
