<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Envases extends Model
{
	public $timestamps = false;
    protected $table = "envases";
     protected $fillable = [
    	'Id_propietario', 'Id_proveedor', 'N_int_envase', 'Estado_envase', 'Material', 'Capacidad', 'Clas_producto', 'Presion', 'Alt_c_valvula', 'P_c_valvula', 'Valvula', 'Tipo_valvula', 'Color', 'N_int_fabricacion', 'Tapa', 'Fecha_compra', 'Garantia', 'Fecha_fabricacion', 'Prueba_hidrostatica', 'Estado_actual', 'Inventario', 'Observaciones',
    ];
    protected $primaryKey='Id_envase';

    //public function propiedad()
    //{
    //	return $this->belongsTo('App\Propietarios','Id_propietario'.'Id_propietario');
   // }

    public function propietario()
    {
    	return $this->belongsTo('App\Propietarios');
   }
}
