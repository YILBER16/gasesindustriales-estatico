<?php

namespace App;
use App\Empleados;
use App\Ordenes;
use App\Envases;
use App\Productos;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificados extends Model
{
     protected $table = "certificados_produccion";
     protected $fillable = [
    	'Id_certificado','Id_produccion','Id_producto', 'Nom_empleado', 'Capacidad', 'Pureza', 'Presion','Producto', 'Observaciones','Estado_certificado'
    ];
    protected $primaryKey='Id_certificado';
    protected $keyType = 'string';

public function empleado()
    {
    	return $this->belongsTo('App\Empleados','Id_empleado','Id_empleado');
   }

public function orden() 
    {
       return $this->hasOne('App\Ordenes', 'Id_produccion', 'Id_produccion');
   }

   public function envases() 
    {
        return $this->belongsToMany(Envases::class, 'certificado_envase','Id_certificado','Id_envase');
   }
   
   public function producto()
    {
      return $this->belongsTo('App\Productos','Id_producto','Id_producto');
   }
   public function certificados_remisiones()
{
  return $this->hasMany(CertifiEnvases::class, 'Id_certificado','Id');
}




}

