<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Proveedores extends Model
{
	use SoftDeletes;
	public $timestamps = false;
     protected $table = "proveedores";
     protected $fillable = [
    	'Id_proveedor','Nom_proveedor', 'Dir_proveedor','Ciudad', 'Tel_proveedor', 'Cor_proveedor',
    ];
    protected $primaryKey='Id_proveedor';
    protected $keyType = 'string';
    protected $dates= ['delete_at'];
}
