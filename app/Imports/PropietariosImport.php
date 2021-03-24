<?php

namespace App\Imports;

use App\Propietarios;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class PropietariosImport implements ToModel, WithHeadingRow,WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Propietarios([
           'Id_propietario' => $row['identificacion'],//a
            'Nom_propietario' => $row['nombre'],//b
            'Ciudad' => $row['ciudad'],//c
            'Dir_propietario' => $row['direccion'],//d
            'Tel_propietario' => $row['telefono'],//c
            'Cor_propietario' => $row['correo'],//c
        ]);
    }
   
     public function rules():array
    {
        return[
            '*.identificacion'=>'unique:propietarios,Id_propietario',
            'nombre'=>'required',
            'ciudad'=>'required',
            'direccion'=>'required',
            'telefono'=>'required', 
            'correo'=>'required', 
      
        ];

    }
    public function customValidationMessages()
{
    return [
        'identificacion.unique' => 'Ya existe esta identificación',
        'nombre.required' => 'Todos los nombres son requeridos',
        'direccion.required' => 'Todas las direcciones son requeridas',
        'ciudad.required' => 'Todas las ciudades son requeridas',
        'telefono.required' => 'Todos los telefonos son requeridos',
        'correo.required' => 'Todos los correos son requeridos',
    ];
}
}
