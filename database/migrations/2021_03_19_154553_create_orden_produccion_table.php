<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenProduccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_produccion', function (Blueprint $table) {
            $table->bigInteger('Id_produccion')->unsigned();
            $table->primary('Id_produccion');
            $table->date('Fecha_solicitud')->nullable();
            $table->string('N_lote',12);
            $table->string('N_envases',12);
            $table->string('Cantidad_m3',12);
            $table->string('Turno',12);
            $table->dateTime('Fecha_vencimiento')->nullable();
            $table->string('Estado',1)->nullable();
            $table->Integer('certi_estado')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orden_produccion');
    }
}
