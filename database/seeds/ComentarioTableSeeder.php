<?php

use Illuminate\Database\Seeder;

class ComentarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('comentario')->insert([
            'comentario' => 'Si',
            'id_publicacion' => 2,
            'id_usuario' => 4,
            'reportado' => false
        ]);
    }
}
