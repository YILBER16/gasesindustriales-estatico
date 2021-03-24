<?php

namespace App;
use App\Envases;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Propietarios extends Model
{
	use SoftDeletes;
	public $timestamps = false;

     protected $table = "propietarios";
     protected $fillable = [
    	'Id_propietario','Nom_propietario', 'Ciudad','Dir_propietario', 'Tel_propietario', 'Cor_propietario',
    ];
    protected $primaryKey='Id_propietario';
    protected $keyType = 'string';
    protected $dates= ['delete_at'];

    public function envases()
{
        return $this->belongsToMany(Envases::class, 'envases','Id_propietario','Id_envase');
}
}
