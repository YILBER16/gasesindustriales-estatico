<?php

namespace App\Imports;

use App\Empleados;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class EmpleadosImport implements ToModel, WithHeadingRow,WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Empleados([
            'Id_empleado' => $row['identificacion'],//a
            'Nom_empleado' => $row['nombre'],//b
            'Cargo_empleado' => $row['cargo'],//c
            'Dir_empleado' => $row['direccion'],//d
            'Ciudad' => $row['ciudad'],//c
            'Tel_empleado' => $row['telefono'],//c
        ]);
    }
   
     public function rules():array
    {
        return[
            '*.identificacion'=>'unique:empleados,Id_empleado',
            'nombre'=>'required',
            'cargo'=>'required',
            'direccion'=>'required',
            'ciudad'=>'required',
            'telefono'=>'required', 
      
        ];

    }
    public function customValidationMessages()
{
    return [
        'identificacion.unique' => 'Ya existe esta identificación',
        'nombre.required' => 'Todos los nombres son requeridos',
        'cargo.required' => 'Todas los cargos son requeridos',
        'direccion.required' => 'Todas las direcciones son requeridas',
        'ciudad.required' => 'Todas las ciudades son requeridas',
        'telefono.required' => 'Todos los telefonos son requeridos',
    ];
}
}
