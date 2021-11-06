<?php

namespace App\Imports;

use App\Clientes;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ClientesImport implements ToModel,WithHeadingRow,WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Clientes([
           'Id_cliente' => $row['identificacion'],//a
            'Nom_cliente' => $row['nombre'],//b
            'Dir_cliente' => $row['direccion'],//d
            'Ciudad' => $row['ciudad'],//c
            'Tel_cliente' => $row['telefono'],//c
            'Cor_cliente' => $row['correo'],//c
        ]);
    }
    public function rules():array
    {
        return[
            '*.identificacion'=>'unique:clientes,Id_cliente',
            'nombre'=>'required',
            'direccion'=>'required',
            'ciudad'=>'required',
            'telefono'=>'required', 
             'correo'=>'required', 
      
        ];

    }
    public function customValidationMessages()
{
    return [
        'identificacion.unique' => 'Ya existe esta identificación',
        'nombre.required' => 'Todos los nombres son requeridos',
        // 'direccion.required' => 'Todas las direcciones son requeridas',
        // 'ciudad.required' => 'Todas las ciudades son requeridas',
        // 'telefono.required' => 'Todos los telefonos son requeridos',
        // 'correo.required' => 'Todos los correos son requeridos',
    ];
}
}
