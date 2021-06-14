<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropietariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propietarios', function (Blueprint $table) {
            $table->string('Id_propietario',25);
            $table->primary('Id_propietario');
            $table->string('Nom_propietario',200);
            $table->string('Ciudad',70);
            $table->string('Dir_propietario',200);
            $table->string('Tel_propietario',15)->nullable();
            $table->string('Cor_propietario',200)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('propietarios');
    }
}
