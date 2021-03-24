<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CertifiEnvases;
use App\Certificados;
class Productos extends Model
{
    	
	public $timestamps = false;

    protected $table = "productos";
     protected $fillable = [
    	'Id_producto', 'Nom_producto'
    ];
    protected $primaryKey='Id_producto';

public function envase()
{
        return $this->hasMany(CertifiEnvases::class,'Id_producto','Id_producto');
}
   public function certificado()
    {
      return $this->belongsTo('App\Certificados','Id_producto','Id_producto');
   }
}
