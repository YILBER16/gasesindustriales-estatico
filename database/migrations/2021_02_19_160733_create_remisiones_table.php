<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemisionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remisiones', function (Blueprint $table) {
            $table->string('Id_remision',25);
            $table->primary('Id_remision');
            $table->string('empresa',11);
            $table->date('Fecha_remision');
            $table->string('Id_cliente',25);
            $table->string('Nom_empleado',120);
            $table->bigInteger('Id_empleado');
            $table->string('Observaciones',300);
            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists('remisiones');
    }
}
