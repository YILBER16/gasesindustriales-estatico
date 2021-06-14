<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnvasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('envases', function (Blueprint $table) {
            $table->string('Id_envase',25);
            $table->primary('Id_envase');
            $table->string('Id_propietario',25);
            $table->string('Id_proveedor',25)->nullable();
            $table->string('N_int_envase',20);
            $table->string('Estado_envase',10);
            $table->string('Material',12);
            $table->string('U_medida',15);
            $table->string('Capacidad',12);
            $table->string('Clas_producto',20);
            $table->string('Presion',12);
            $table->string('Alt_c_valvula',12);
            $table->string('P_c_valvula',12);
            $table->string('Valvula',12);
            $table->string('Color',20);
            $table->string('N_int_fabricacion',25);
            $table->string('Tapa',12);
            $table->date('Fecha_compra')->nullable();
            $table->date('Garantia')->nullable();
            $table->date('Fecha_fabricacion')->nullable();
            $table->date('Prueba_hidrostatica')->nullable();
            $table->string('Estado_actual',12);
            $table->string('Inventario',2)->nullable();
            $table->string('Observaciones',250)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('Id_propietario')->references('Id_propietario')->on('propietarios');
            $table->foreign('Id_proveedor')->references('Id_proveedor')->on('proveedores');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('envases');
    }
}
