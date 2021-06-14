<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKardexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kardex', function (Blueprint $table) {
            $table->bigInteger('Id_kardex')->unsigned();
            $table->primary('Id_kardex');
            $table->bigInteger('Id_remision')->unsigned();
            $table->string('Id_envase',25);
            $table->dateTime('Fecha_entrada');
            $table->string('Ciudad',12);
            $table->bigInteger('N_dto_entrada');
            $table->timestamps();
            $table->foreign('Id_envase')->references('Id_envase')->on('envases');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kardex');
    }
}
