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
            $table->bigInteger('Id_remision')->unsigned();
            $table->primary('Id_remision');
            $table->date('Fecha_remision');
            $table->string('Id_cliente',25);
            $table->string('Nom_empleado',120);
            $table->bigInteger('Id_empleado');
            $table->string('Estado_remision',12);
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
