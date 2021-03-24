<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->string('Id_cliente',20);
            $table->primary('Id_cliente');
            $table->string('Nom_cliente',60);
            $table->string('Dir_cliente',120)->nullable();
            $table->string('Ciudad',20);
            $table->string('Tel_cliente',15)->nullable();
            $table->string('Cor_cliente',40);
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
        Schema::dropIfExists('clientes');
    }
}
