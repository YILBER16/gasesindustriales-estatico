<?php

namespace App;
use App\Propietarios;
use App\Envases;
use App\Productos;
use Illuminate\Database\Eloquent\Model;

class CertifiEnvases extends Model
{
    	

    protected $table = "certificado_envase";
     protected $fillable = [
    	'Id','Id_certificado', 'Id_envase', 'Clas_producto', 'Cantidad','Estado'
    ];
    protected $primaryKey='Id';
    protected $keyType = 'string';

    public function certificado()
{
  return $this->belongsToMany('App\Certificados');
}
public function envase()
{
  return $this->belongsTo('App\Envases','Id_envase');
}

public function propietarios()
{
        return $this->belongsToMany(Propietarios::class, 'envases','Id_envase','Id_propietario');
}
public function producto()
{
        return $this->belongsTo(Productos::class,'Id_producto','Id_producto');
}

}
