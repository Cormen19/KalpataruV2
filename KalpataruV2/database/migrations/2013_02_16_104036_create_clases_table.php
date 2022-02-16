<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clases', function (Blueprint $table) {
            $table->id();
            $table->unsignedbigInteger('idCurso');
            $table->unsignedbigInteger('idNivel');
            $table->unsignedbigInteger('idGrado');
            $table->foreign('idCurso')->references('id')->on('cursos');
            $table->foreign('idNivel')->references('id')->on('niveles');
            $table->foreign('idGrado')->references('id')->on('grados');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clases');
    }
}
