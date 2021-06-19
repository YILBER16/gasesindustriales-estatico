<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Devoluciones extends Model
{
    protected $table = "devoluciones";

    protected $fillable = [
    	'id','Id_remision','Id_cliente', 'Id_envase', 'Producto','Cantidad', 'Fecha_devolucion', 'Id_empleado', 'Nom_empleado', 'Descripcion'
    ];


    protected $primaryKey='id';

    public function cliente()
    {
      return $this->belongsTo(Clientes::class,'Id_cliente','Id_cliente');
   }
}
