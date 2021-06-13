<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificadosProduccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificados_produccion', function (Blueprint $table) {
            $table->id('Id_certificado');
            $table->bigInteger('Id_produccion')->unsigned();
            $table->bigInteger('Id_producto')->unsigned();
            $table->string('Nom_empleado',80);
            $table->string('Capacidad',40);
            $table->bigInteger('Pureza');
            $table->bigInteger('Presion');
            $table->string('Observaciones',90)->nullable();
            $table->string('Estado_certificado',2);
            $table->timestamps();
            $table->foreign('Id_produccion')->references('Id_produccion')->on('orden_produccion');
            $table->foreign('Id_producto')->references('Id_producto')->on('productos');
           

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificados_produccion');
    }
}
