<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Autoevaluaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autoevaluaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('deposito_id'); 
            $table->foreign('deposito_id')->references('id')->on('depositos');
            $table->unsignedBigInteger('asignacion_id'); 
            $table->foreign('asignacion_id')->references('id')->on('asignaciones')->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->date('fechaConclusion')->nullable();
            $table->integer('estatus');
            $table->softDeletes();
            $table->integer('activo');
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
        Schema::dropIfExists('autoevaluaciones');
        Schema::softDeletes('autoevaluaciones');

    }

    
}
