<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Remisiones;
use App\Devoluciones;
class Clientes extends Model
{
	use SoftDeletes;

    protected $table = "clientes";
     protected $fillable = [
    	'Id_cliente','Nom_cliente', 'Dir_cliente','Ciudad', 'Tel_cliente', 'Cor_cliente',
    ];
    protected $primaryKey='Id_cliente';
    protected $keyType = 'string';
    protected $dates= ['delete_at'];

    public function remisiones()
{
        return $this->belongsToMany(Remisiones::class, 'remisiones','Id_cliente','Id_remision');
}
public function devoluciones()
{
        return $this->belongsToMany(devoluciones::class, 'devoluciones','Id_cliente','id');
}
}
