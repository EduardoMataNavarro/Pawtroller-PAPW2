<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VideoMascota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('video_mascotas', function (Blueprint $table) {
            $table->increments('id_video')->unsigned();
            $table->string('path');
            $table->string('format');
            $table->integer('id_mascota')->unsigned();
            $table->timestamps();

            $table->foreign('id_mascota')->references('id_mascota')->on('mascotas');
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
        Schema::dropIfExists('videoMascota');
    }
}
