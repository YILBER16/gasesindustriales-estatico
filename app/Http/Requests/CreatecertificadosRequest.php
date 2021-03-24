<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatecertificadosRequest extends FormRequest
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

            'Id_certificado.required' => 'el id es obligatoria',
            'Id_certificado.unique' => 'Esta identificacion ya existe',
            'unique' => 'El :attribute ya existe',
            'Id_produccion.required' => 'el propietario es obligatorio es obligatoria',
            'Id_empleado.required' => 'El proveedor es obligatoria',
            'Capacidad.required' => 'El nombre es obligatorio',
            'Pureza.required' => 'La direccion es obligatoria',
            'Presion.required' => 'La direccion es obligatoria',
            'Id_producto.required' => 'El producto  es obligatorio',
           
            
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
            'Id_certificado'=>'required|unique:envases|min:5',
            'Id_produccion'=>'required',
            'Id_empleado'=>'required',
            'Capacidad'=>'required',
            'Estado_envase'=>'required',
            'Pureza'=>'required',
            'Presion'=>'required',
            'Id_producto'=>'required',
           
            //
        ];
    }
}
