<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreaterolesRequest extends FormRequest
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
            'name.required' => 'El nombre es obligatorio',
            'slug.required' => 'El slug es obligatorio',

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
            'name'=>'required',
            'slug'=>'required',

        ];

    }
}