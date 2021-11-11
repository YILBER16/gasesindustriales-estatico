<?php

namespace App;
use App\Envases;
use App\Clientes;
use App\Empleados;
use App\Envase_remision;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remisiones extends Model
{

     protected $table = "remisiones";
     protected $fillable = [
    	'Id_remision','Fecha_remision', 'Id_cliente','Id_empleado', 'Estado_remision',
    ];
    protected $primaryKey='Id_remision';
    protected $keyType = 'string';
    protected $dates= ['delete_at'];
    public function envases() 
    {
        return $this->belongsToMany(Envases::class, 'envase_remision','Id_remision','Id_envase')->as('subscription')->withPivot('Producto', 'Cantidad','Estado')->wherePivot('Estado', 1)
                ->withTimestamps();
   }
   public function cliente()
    {
      return $this->belongsTo(Clientes::class,'Id_cliente','Id_cliente');
   }
   public function empleado()
    {
      return $this->belongsTo(Empleados::class,'Id_empleado','Id_empleado');
   }

   public function envases_remisiones()
{
  return $this->hasMany(Envase_remision::class, 'Id','Id_remision');
}



}

