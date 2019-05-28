<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Comentario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('comentarios', function (Blueprint $table) {
            $table->softDeletes();
            $table->increments('id_comentario')->unsigned();
            $table->string('comentario');
            $table->integer('id_publicacion')->unsigned();
            $table->integer('id_usuario')->unsigned();
            $table->boolean('reportado');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

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
        //
        Schema::dropIfExists('comentario');
    }
}
