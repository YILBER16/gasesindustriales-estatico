<?php

namespace App\Imports;

use App\Proveedores;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProveedoresImport implements ToModel, WithHeadingRow,WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Proveedores([
           'Id_proveedor' => $row['identificacion'],//a
            'Nom_proveedor' => $row['nombre'],//b
            'Ciudad' => $row['ciudad'],//c
            'Dir_proveedor' => $row['direccion'],//d
            'Tel_proveedor' => $row['telefono'],//c
            'Cor_proveedor' => $row['correo'],//c
        ]);
    }
   
     public function rules():array
    {
        return[
            '*.identificacion'=>'unique:proveedores,Id_proveedor',
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
