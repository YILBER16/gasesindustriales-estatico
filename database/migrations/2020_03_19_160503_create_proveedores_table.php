<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->string('Id_proveedor',15);
            $table->primary('Id_proveedor');
            $table->string('Nom_proveedor',60);
            $table->string('Dir_proveedor',60);
            $table->string('Ciudad',20);
            $table->string('Tel_proveedor',12);
            $table->string('Cor_proveedor',40);
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
        Schema::dropIfExists('proveedores');
    }
}
