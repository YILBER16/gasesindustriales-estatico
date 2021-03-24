<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->bigInteger('Id_empleado')->unsigned();
            $table->primary('Id_empleado');
            $table->string('Nom_empleado',70);
            $table->string('Cargo_empleado',20);
            $table->string('Dir_empleado',80)->nullable();
            $table->string('Ciudad',20);
            $table->string('Tel_empleado',15)->nullable();
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
        Schema::dropIfExists('empleados');
    }
}
