<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('dni');
            $table->string('email');
            $table->string('contrasenia');
            $table->date('fecha_nacimiento');
            $table->unsignedbigInteger('idClase');
            $table->foreign('idClase')->references('id')->on('clases');
            $table->unsignedbigInteger('idEstado');
            $table->foreign('idEstado')->references('id')->on('usuarioestados');
            $table->unsignedbigInteger('idRol');
            $table->foreign('idRol')->references('id')->on('usuarioroles');
            $table->unsignedbigInteger('penalizaciones');
            $table->string('tokenActivacion');
            $table->string('tokenRecordarpass');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
