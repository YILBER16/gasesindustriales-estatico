<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateempleadosRequest extends FormRequest
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

            'Id_empleado.required' => 'La cedula es obligatoria',
            'Id_empleado.unique' => 'Esta identificacion ya existe',
            'unique' => 'El :attribute ya existe',
            'Nom_empleado.required' => 'El nombre es obligatorio',
            'Cargo_empleado.required' => 'El cargo es obligatorio',
            'Dir_empleado.required' => 'La direccion es obligatoria',
            'Tel_empleado.required' => 'El telefono es obligatorio',
            'Ciudad.required' => 'La ciudad es obligatoria',
            'direccion.required' => 'La direccion es requerida',     

            
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
            'Id_empleado'=>'required|unique:empleados|min:5',
            'Nom_empleado'=>'required',
            'Cargo_empleado'=>'required',
            'Dir_empleado'=>'required',
            'Tel_empleado'=>'required',
            'Ciudad'=>'required',
         
        ];


    }
}
