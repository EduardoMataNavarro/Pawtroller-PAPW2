<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicacionCalificacionUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicacion_calificacion_usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('id_publicacion')->unsigned();
            $table->integer('id_usuario')->unsigned();
            $table->boolean('tipo');

            $table->foreign('id_publicacion')->references('id_publicacion')->on('publicacions');
            $table->foreign('id_usuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publicacion_calificacion_usuarios');
    }
}
