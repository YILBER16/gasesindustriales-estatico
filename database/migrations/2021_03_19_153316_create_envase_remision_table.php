<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnvaseRemisionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('envase_remision', function (Blueprint $table) {
            $table->bigInteger('Id')->unsigned();
            $table->primary('Id');
            $table->string('Id_envase',20);
            $table->bigInteger('Id_remision')->unsigned();
            $table->string('Producto',11);
            $table->string('Cantidad',11);
            $table->dateTime('Fecha_ingreso')->nullable();
            $table->string('Estado',15);
            $table->timestamps();
            $table->foreign('Id_envase')->references('Id_envase')->on('envases');
            $table->foreign('Id_remision')->references('Id_remision')->on('remisiones');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('envase_remision');
    }
}
