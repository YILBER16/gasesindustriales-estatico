<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevolucionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devoluciones', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('Id_remision')->unsigned();
            $table->string('Id_cliente',25);
            $table->string('Id_envase',25);
            $table->string('Producto',80);
            $table->string('Cantidad',11);
            $table->dateTime('Fecha_devolucion');
            $table->string('Nom_empleado',120);
            $table->bigInteger('Id_empleado');
            $table->string('Descripcion',200);
            $table->timestamps();

            $table->foreign('Id_envase')->references('Id_envase')->on('envases');
            $table->foreign('Id_remision')->references('Id_remision')->on('remisiones');
            $table->foreign('Id_cliente')->references('Id_cliente')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devoluciones');
    }
}
