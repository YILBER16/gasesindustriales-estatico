<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Propietarios;
use App\Certificados;
use App\Remisiones;

class Envases extends Model
{
  use SoftDeletes;
    protected $table = "envases";
     protected $fillable = [
    	'Id_envase','Id_propietario', 'Id_proveedor', 'N_int_envase', 'Estado_envase', 'Material', 'Capacidad','U_medida', 'Clas_producto', 'Presion', 'Alt_c_valvula', 'P_c_valvula', 'Valvula', 'Tipo_valvula', 'Color', 'N_int_fabricacion', 'Tapa', 'Fecha_compra', 'Garantia', 'Fecha_fabricacion', 'Prueba_hidrostatica', 'Estado_actual', 'Inventario', 'Observaciones',
    ];
    protected $primaryKey='Id_envase';
    protected $keyType = 'string';
    protected $dates= ['delete_at'];

    //public function propiedad()
    //{
    //	return $this->belongsTo('App\Propietarios','Id_propietario'.'Id_propietario');
   // }

    public function propietario()
    {
    	return $this->belongsTo(Propietarios::class,'Id_propietario','Id_propietario');
   }
   
    public function proveedores()
    {
      return $this->belongsTo('App\Proveedores');
   }
   public function certificados() 
    {
        return $this->belongsToMany(Certificados::class, 'certificado_envase', 'Id_envase','Id_certificado');
   }

   public function certiEnvase() 
    {
        return $this->belongsToMany(CertiEnvase::class, 'certificado_envase');
   }
   public function remisiones() 
    {
        return $this->belongsToMany(Remisiones::class, 'envase_remision', 'Id_envase','Id_remision')
        ->withPivot('Id','Id_envase','Id_remision','Producto','Cantidad','Fecha_ingreso','Estado');
   
   }
}
