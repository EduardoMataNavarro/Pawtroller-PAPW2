<?php

use Illuminate\Database\Seeder;

class categoriaPublicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() 
    {
        //
        DB::table('categoria_publicacions')->insert([
            'descripcion' => 'Noticias'
        ]);
        DB::table('categoria_publicacions')->insert([
            'descripcion' => 'Avisos'
        ]);
        DB::table('categoria_publicacions')->insert([
            'descripcion' => 'Recomendaciones'
        ]);
        DB::table('categoria_publicacions')->insert([
            'descripcion' => 'Alertas'
        ]);
        DB::table('categoria_publicacions')->insert([
            'descripcion' => 'Denuncias'
        ]);
        DB::table('categoria_publicacions')->insert([
            'descripcion' => 'Ayuda'
        ]);
    }
}
