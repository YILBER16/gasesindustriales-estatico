<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatepropietariosRequest extends FormRequest
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

            'Id_propietario.required' => 'La cedula es obligatoria',
            'Id_propietario.unique' => 'Esta identificacion ya existe',
            'unique' => 'El :attribute ya existe',
            'Nom_propietario.required' => 'El nombre es obligatorio',
            'Ciudad.required' => 'La ciudad es obligatoria',
            'Dir_propietario.required' => 'La direccion es obligatoria',
            'Tel_propietario.required' => 'El telefono es obligatorio',
            'Cor_propietario.required' => 'El correo es obligatorio',
            
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
            'Id_propietario'=>'required|unique:propietarios|min:5',
            'Nom_propietario'=>'required',
            'Ciudad'=>'required',
            'Dir_propietario'=>'required',
            'Tel_propietario'=>'required',
            'Cor_propietario'=>'required',
        ];
    }
}
