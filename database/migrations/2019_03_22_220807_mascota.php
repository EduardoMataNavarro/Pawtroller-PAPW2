<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Mascota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('mascotas', function (Blueprint $table) {
            $table->softDeletes();
            $table->increments('id_mascota')->unsigned();
            $table->string('nombreMascota');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('id_status')->unsigned();
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_raza')->unsigned();
            $table->integer('id_color')->unsigned();
            $table->string('comentarios');

            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_raza')->references('id_raza')->on('razas');
            $table->foreign('id_color')->references('id_color')->on('color_mascotas');
            $table->foreign('id_status')->references('id')->on('status_mascotas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('mascota');
    }
}
