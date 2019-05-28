<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentarioMascotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentario_mascotas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comentario');
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_mascota')->unsigned();
            $table->integer('id_parent')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_mascota')->references('id_mascota')->on('mascotas');
            $table->foreign('id_parent')->references('id')->on('comentario_mascotas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentario_mascotas');
    }
}
