<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleados extends Model
{
	use SoftDeletes;

public $timestamps = false;

   

    protected $table = "empleados";

    protected $fillable = [
    	'Id_empleado','Nom_empleado', 'Cargo_empleado', 'Dir_empleado','Ciudad', 'Tel_empleado', 'Perfil_empleado', 'delete_at',
    ];


    protected $primaryKey='Id_empleado';
    protected $dates= ['delete_at'];
   
public function certificado() 
    {
        return $this->hasMany('App\Certificados','Id_certificado','Id_certificado');
   }
   public function remisiones()
{
        return $this->belongsToMany(Remisiones::class, 'remisiones','Id_empleado','Id_empleado');
}
}
