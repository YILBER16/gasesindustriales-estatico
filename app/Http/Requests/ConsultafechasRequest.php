<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultafechasRequest extends FormRequest
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

            'fechainicial.required' => 'La fecha y hora inicial es obligatoria',
            'fechafinal.required' => 'La fecha y hora final es obligatoria',
         
            
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
            'fechainicial'=>'required',
            'fechafinal'=>'required',
        ];
    }
}
