<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Controles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('referencial');
            $table->text('riesgosDominio');
            $table->text('riesgosClave');
            $table->text('objetivo');
            $table->text('guia');
            $table->unsignedBigInteger('area_id'); 
            $table->foreign('area_id')->references('id')->on('areas');
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
        Schema::dropIfExists('controles');
        Schema::softDeletes('controles');
    }
}
