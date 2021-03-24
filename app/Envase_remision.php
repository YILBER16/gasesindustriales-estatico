<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Remisiones;
use Carbon\Carbon;
class Envase_remision extends Model
{
    protected $table = "envase_remision";
     protected $fillable = [
    	'Id', 'Id_envase', 'Id_remision', 'Producto','Cantidad','Fecha_ingreso','Estado'
    ];
    protected $primaryKey='Id';
    protected $keyType = 'string';

    public function envases()
{
  return $this->belongsToMany('App\Envases');
}
public function remision()
{
  return $this->belongsTo(Remisiones::class, 'Id_remision','Id_remision');
}


}
