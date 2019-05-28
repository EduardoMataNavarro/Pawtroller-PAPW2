<?php

use Illuminate\Database\Seeder;

class ColorMascotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('color_mascotas')->insert([
            'descripcion' => 'Amarillo'
        ]);
        DB::table('color_mascotas')->insert([
            'descripcion' => 'Atigrado'
        ]);
        DB::table('color_mascotas')->insert([
            'descripcion' => 'Azul'
        ]);
        DB::table('color_mascotas')->insert([
            'descripcion' => 'Blanco'
        ]);
        DB::table('color_mascotas')->insert([
            'descripcion' => 'Blanco y Negro'
        ]);
        DB::table('color_mascotas')->insert([
            'descripcion' => 'Canela'
        ]);
        DB::table('color_mascotas')->insert([
            'descripcion' => 'Crema'
        ]);
        DB::table('color_mascotas')->insert([
            'descripcion' => 'Dorado'
        ]);
        DB::table('color_mascotas')->insert([
            'descripcion' => 'Gris'
        ]);
        DB::table('color_mascotas')->insert([
            'descripcion' => 'Marron claro'
        ]);
        DB::table('color_mascotas')->insert([
            'descripcion' => 'Marron oscuro'
        ]);
        DB::table('color_mascotas')->insert([
            'descripcion' => 'Negro'
        ]);
        DB::table('color_mascotas')->insert([
            'descripcion' => 'Sal y pimienta'
        ]);
    }
}
