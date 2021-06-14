<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificadoEnvaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificado_envase', function (Blueprint $table) {
            $table->id('Id');
            $table->bigInteger('Id_certificado')->unsigned();
            $table->string('Id_envase',25);
            $table->string('Clas_producto',80);
            $table->string('Cantidad',20);
            $table->string('Estado',2)->nullable();
            $table->timestamps();
            $table->foreign('Id_certificado')->references('Id_certificado')->on('certificados_produccion');
            $table->foreign('Id_envase')->references('Id_envase')->on('envases');


        });
        
        Artisan::call('db:seed', [
            '--class' => DatabaseSeeder::class
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificado_envase');
    }
}
