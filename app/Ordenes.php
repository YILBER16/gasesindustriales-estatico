<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Certificado;

class Ordenes extends Model
{

	public $timestamps = true;

    protected $table = "orden_produccion";
     protected $fillable = [
    	'Fecha_solicitud', 'N_lote', 'N_envases', 'Cantidad_m3', 'Turno', 'Fecha_vencimiento', 'Estado','certi_estado'
    ];
    
    protected $primaryKey='Id_produccion';


    
    public function certificado()
{
  return $this->hasOne('App\Certificado', 'Id_produccion', 'Id_certificado');
}
}