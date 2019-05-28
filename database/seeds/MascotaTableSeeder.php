<?php

use Illuminate\Database\Seeder;

class MascotaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('mascotas')->insert([
            'nombreMascota' => 'Marrano',
            'id_status' => 2,
            'id_usuario' => 2,
            'id_raza' => 1,
            'id_color' => 4,
            'comentarios' => 'Amistoso, tiende a lamer mucho'
        ]);
        
        DB::table('mascotas')->insert([
            'nombreMascota' => 'Juanito',
            'id_status' => 1,
            'id_usuario' => 3,
            'id_raza' => 4,
            'id_color' => 6,
            'comentarios' => 'Ladra mucho, ya no tiene muchos dientes'
        ]);
    }
}
