<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentarioCalificacionUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentario_calificacion_usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->boolean('tipo');
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_comentario')->unsigned();

            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_comentario')->references('id_comentario')->on('comentarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentario_calificacion_usuarios');
    }
}
