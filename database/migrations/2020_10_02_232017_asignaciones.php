<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Asignaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fechaEntrega');
            $table->text('nota');
            $table->string('mes');
            $table->year('anio');
            $table->integer('activo');
            $table->integer('estatus');
            $table->integer('completado');
            $table->integer('total');
            $table->softDeletes();
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

        Schema::dropIfExists('asignaciones');
        Schema::softDeletes('asignaciones');
    }
}
