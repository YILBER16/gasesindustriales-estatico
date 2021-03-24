<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Clientes extends Model
{
	use SoftDeletes;
	public $timestamps = false;

    protected $table = "clientes";
     protected $fillable = [
    	'Nom_cliente', 'Dir_cliente', 'Tel_cliente', 'Cor_cliente',
    ];
    protected $primaryKey='Id_cliente';
    protected $dates= ['delete_at'];
}
