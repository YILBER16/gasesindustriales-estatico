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
            $table->id('Id');
            $table->string('Id_envase',25);
            $table->string('Id_remision',25);
            $table->bigInteger('Id_certificado')->unsigned();
            $table->string('Producto',80);
            $table->string('Cantidad',11);
            $table->dateTime('Fecha_ingreso')->nullable();
            $table->string('Estado',15);
            $table->timestamps();
            $table->foreign('Id_envase')->references('Id_envase')->on('envases');
            $table->foreign('Id_remision')->references('Id_remision')->on('remisiones');
            $table->foreign('Id_certificado')->references('Id_certificado')->on('certificados_produccion');

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
