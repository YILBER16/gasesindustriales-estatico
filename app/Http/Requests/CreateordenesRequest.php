<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateordenesRequest extends FormRequest
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

    
            'Id_produccion.unique' => 'Este número de orden ya existe',
            'unique' => 'El :attribute ya existe',
            'Fecha_solicitud.required' => 'Fecha obligatoria',
            'N_lote.required' => 'El numero de lote es obligatorio',
            'N_envases.required' => 'Cantidad de envases es obligatoria',
            'Cantidad_m3.required' => 'La cantidad a producir es obligatorio',
            //'Fecha_final.required' => 'La fecha final es obligatoria',
            //'Tiempo_produccion.required' => 'El tiempo de produccion es obligatorio',
            'Turno.required' => 'Turno es obligatorio',
            'Fecha_vencimiento.required' => 'Fecha de vencimiento es obligatoria',
            //'Fecha_vencimiento.required' => 'La fecha de vencimiento es obligatoria',
            //'Estado.required' => 'La fecha de vencimiento es obligatoria',
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
           
            'Fecha_solicitud'=>'required',
            'N_lote'=>'required',
            'N_envases'=>'required',
            'Cantidad_m3'=>'required',
            //'Fecha_final'=>'required',
            //'Tiempo_produccion'=>'required',
            'Turno'=>'required',
            'Fecha_vencimiento'=>'required',
           // 'Fecha_vencimiento'=>'required',
            //
        ];
    }
}
