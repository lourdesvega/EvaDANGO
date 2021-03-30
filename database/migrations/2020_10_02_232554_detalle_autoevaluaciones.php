<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetalleAutoevaluaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalleAutoevaluaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('control_id');
            $table->foreign('control_id')->references('id')->on('controles')->onDelete('cascade');
            $table->unsignedBigInteger('autoevaluacion_id');
            $table->foreign('autoevaluacion_id')->references('id')->on('autoevaluaciones')->onDelete('cascade')->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');;
            $table->string('calificacion')->nullable();
            $table->text('hallazgo')->nullable();
            $table->text('plan')->nullable();
            $table->date('fechaCompromiso')->nullable();
            $table->unsignedBigInteger('responsable_id')->nullable();
            $table->foreign('responsable_id')->references('id')->on('responsables');
            $table->softDeletes();
            $table->integer('estatus');
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

        Schema::dropIfExists('detalleAutoevaluaciones');
        Schema::softDeletes('detalleAutoevaluaciones');

    }
}
