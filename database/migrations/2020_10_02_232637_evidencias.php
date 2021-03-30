<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Evidencias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evidencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('detalle_id');
            $table->foreign('detalle_id')->references('id')->on('detalleAutoevaluaciones')->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('nombre');
            $table->string('nomOriginal');
            $table->string('ubicacion');
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
        Schema::dropIfExists('evidencias');
        Schema::softDeletes('evidencias');


    }
}
