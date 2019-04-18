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
        DB::table('mascota')->insert([
            'nombreMascota' => 'Marrano',
            'status' => 'bien',
            'id_usuario' => 2,
            'id_raza' => 1,
            'id_color' => 4,
            'comentarios' => 'Amistoso, tiende a lamer mucho'
        ]);
        DB::table('mascota')->insert([
            'nombreMascota' => 'Juanito',
            'status' => 'bien',
            'id_usuario' => 3,
            'id_raza' => 4,
            'id_color' => 6,
            'comentarios' => 'Ladra mucho, ya no tiene muchos dientes'
        ]);
    }
}
