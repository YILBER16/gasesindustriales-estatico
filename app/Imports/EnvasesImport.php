<?php

namespace App\Imports;

use App\Envases;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class EnvasesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Envases([
            'Id_envase' => $row['n_envase'],//a
            'Id_propietario' => $row['propietario'],//b
            'Id_proveedor' => $row['proveedor'],//c
            'N_int_envase' => $row['n_interno_envase'],//d
            'Estado_envase' => $row['estado_envase'],//c
            'Material' => $row['material'],//c
            'U_medida' => $row['unidad_de_medida'],//c
            'Capacidad' => $row['capacidad'],//c
            'Clas_producto' => $row['clase_de_producto'],//c
            'Presion' => $row['presion'],//c
            'Alt_c_valvula' => $row['altura_con_valvula'],//c
            'P_c_valvula' => $row['presion_con_valvula'],//c
            'Valvula' => $row['valvula'],//c
            'Color' => $row['color'],//c
            'N_int_fabricacion' => $row['norma_tecnica_fabricacion'],//c
            'Tapa' => $row['tapa'],//c
            'Fecha_compra' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['fecha_compra']),//c
            'Garantia' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['garantia']),//c
            'Fecha_fabricacion' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['fecha_fabricacion']),//c
            'Prueba_hidrostatica' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['prueba_hidrostatica']),//c
            'Estado_actual' => '0',//c
            'Inventario' => '1',//c
            'Observaciones' => $row['observaciones'],//c
        ]);
    }
}
