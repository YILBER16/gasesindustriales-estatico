<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Proveedores extends Model
{
	use SoftDeletes;
	public $timestamps = false;
     protected $table = "proveedores";
     protected $fillable = [
    	'Nomb_proveedor', 'Dir_proveedor', 'Tel_proveedor', 'Cor_proveedor',
    ];
    protected $primaryKey='Id_proveedor';
    protected $dates= ['delete_at'];
}
