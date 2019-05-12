<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Perdido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('perdidos', function (Blueprint $table) {
            $table->softDeletes();
            $table->increments('id_perdida')->unsigned();
            $table->string('lugar')->nullable();
            $table->string('info_adicional');
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->integer('id_mascota')->unsigned();

            $table->foreign('id_mascota')->references('id_mascota')->on('mascota');
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
        Schema::dropIfExists('perdido');
    }
}
