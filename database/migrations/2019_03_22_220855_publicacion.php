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
        Schema::create('publicacions', function (Blueprint $table) {
            $table->softDeletes();
            $table->increments('id_publicacion')->unsigned();
            $table->string('titulo');
            $table->string('texto');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('id_usuario')->unsigned();
            $table->boolean('reportado');
            $table->integer('id_categoria')->unsigned();
            $table->boolean('borrador');

            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_categoria')->references('id_categoria')->on('categoria_publicacions');
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
