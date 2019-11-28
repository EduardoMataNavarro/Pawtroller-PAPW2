<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioPreguntaMascotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_pregunta_mascotas', function (Blueprint $table) {
            $table->softDeletes();
            $table->increments('id');
            $table->integer('id_usuario_pregunta')->unsigned();
            $table->integer('id_mascota')->unsigned();
            $table->string('comentario');
            $tabñe->integer('id_usuario_responde')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('id_mascota')->references('id_mascota')->on('mascotas');
            $table->foreign('id_usuario_pregunta')->references('id')->on('users');
            $table->foreign('id_usuario_respuesta')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario_pregunta_mascotas');
    }
}
