<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMensajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensajes', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('texto');
            $table->date('fecha_creacion');
            $table->unsignedbigInteger('meGustas');
            $table->unsignedbigInteger('formahoja');
            $table->string('hexadecimalColorHoja');
            $table->unsignedbigInteger('idUsuario');
            $table->foreign('idUsuario')->references('id')->on('users');
            $table->unsignedbigInteger('idClase');
            $table->foreign('idClase')->references('id')->on('clases');
            $table->unsignedbigInteger('idEstado');
            $table->foreign('idEstado')->references('id')->on('mensajeestados');
            $table->unsignedbigInteger('anonimo');
            $table->string('tokenActivacion');
            $table->string('tokenEliminar');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mensajes');
    }
}
