<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Publicacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('publicacion', function (Blueprint $table) {
            $table->increments('id_publicacion')->unsigned();
            $table->string('titulo');
            $table->string('texto');
            $table->timestamp('created_at')->nullable();
            $table->integer('id_usuario')->unsigned();
            $table->boolean('reportado');

            $table->foreign('id_usuario')->references('id_usuario')->on('users');
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
        Schema::dropIfExists('publicacion');
    }
}
