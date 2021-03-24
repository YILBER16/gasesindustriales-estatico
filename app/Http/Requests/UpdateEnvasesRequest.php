<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEnvasesRequest extends FormRequest
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
            'Id_envase.required' => 'Id de envase obligatorio',
            'Id_propietario.required' => 'El propietario es obligatorio',
            'N_int_envase.required' => 'Nº interno obligatorio',
            'Estado_envase.required' => 'Estado obligatorio',
            'Material.required' => 'Material obligatorio',
            'Capacidad.required' => 'Capacidad obligatoria',
            'U_medida.required' => 'Unidad de medida obligatoria',
            'Clas_producto.required' => 'Clase de producto obligatorio',
            'Presion.required' => 'Presion obligatoria',
            'Alt_c_valvula.required' => 'Altura con valvula obligatoria',
            'P_c_valvula.required' => 'Peso con valvula obligatoria',
            'Valvula.required' => 'Valvula obligatoria',
            'Color.required' => 'Color obligatorio',
            'N_int_fabricacion.required' => 'Norma tecnica obligatoria',
            'Tapa.required' => 'Tapa obligatoria',
            'Fecha_compra.required_with' => 'Por favor digite la fecha de compra',
            'Garantia.required_with' => 'Por favor digite la fecha de garantia',
            'Fecha_fabricacion.required_with' => 'Por favor digite la fecha de fabricación',
            
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
            'Id_envase'=>'required',
            'Id_propietario'=>'required',
            'Id_proveedor'=>'nullable',
            'N_int_envase'=>'required',
            'Estado_envase'=>'required',
            'Material'=>'required',
            'Capacidad'=>'required',
            'U_medida'=>'required',
            'Clas_producto'=>'required',
            'Presion'=>'required',
            'Alt_c_valvula'=>'required',
            'P_c_valvula'=>'required',
            'Valvula'=>'required',
            'Color'=>'required',
            'N_int_fabricacion'=>'required',
            'Tapa'=>'required',
            'Fecha_compra'=>'required_with:Id_proveedor',
            'Garantia'=>'required_with:Id_proveedor',
            'Fecha_fabricacion'=>'required_with:Id_proveedor',
          
        ];
    }
}
