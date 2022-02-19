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
            $table->unsignedbigInteger('clase_id');
            $table->foreign('clase_id')->references('id')->on('clases');
            $table->unsignedbigInteger('estado_id');
            $table->foreign('estado_id')->references('id')->on('usuario_estados');
            $table->unsignedbigInteger('rol_id');
            $table->foreign('rol_id')->references('id')->on('usuario_rols');
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
