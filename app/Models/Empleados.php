<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleados extends Model
{
	use SoftDeletes;

public $timestamps = false;

    

    protected $table = "empleados";

    protected $fillable = [
    	'Nom_empleado', 'Cargo_empleado', 'Dir_empleado', 'Tel_empleado', 'Perfil_empleado', 
    ];


    protected $primaryKey='Id_empleado';
    protected $dates= ['delete_at'];
   

}
