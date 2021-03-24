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
            $table->string('Id_propietario',15);
            $table->primary('Id_propietario');
            $table->string('Nom_propietario',60);
            $table->string('Ciudad',20);
            $table->string('Dir_propietario',60);
            $table->string('Tel_propietario',12)->nullable();
            $table->string('Cor_propietario',40)->nullable();
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
