<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Propietarios extends Model
{
	use SoftDeletes;
	public $timestamps = false;

     protected $table = "propietarios";
     protected $fillable = [
    	'Nom_propietario', 'Ciudad','Dir_propietario', 'Tel_propietario', 'Cor_propietario',
    ];
    protected $primaryKey='Id_propietario';
    protected $dates= ['delete_at'];
}
