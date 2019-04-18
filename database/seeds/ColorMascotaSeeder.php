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
        DB::table('colorMascota')->insert([
            'descripcion' => 'Amarillo'
        ]);
        DB::table('colorMascota')->insert([
            'descripcion' => 'Atigrado'
        ]);
        DB::table('colorMascota')->insert([
            'descripcion' => 'Azul'
        ]);
        DB::table('colorMascota')->insert([
            'descripcion' => 'Blanco'
        ]);
        DB::table('colorMascota')->insert([
            'descripcion' => 'Blanco y Negro'
        ]);
        DB::table('colorMascota')->insert([
            'descripcion' => 'Canela'
        ]);
        DB::table('colorMascota')->insert([
            'descripcion' => 'Crema'
        ]);
        DB::table('colorMascota')->insert([
            'descripcion' => 'Dorado'
        ]);
        DB::table('colorMascota')->insert([
            'descripcion' => 'Gris'
        ]);
        DB::table('colorMascota')->insert([
            'descripcion' => 'Marron claro'
        ]);
        DB::table('colorMascota')->insert([
            'descripcion' => 'Marron oscuro'
        ]);
        DB::table('colorMascota')->insert([
            'descripcion' => 'Negro'
        ]);
        DB::table('colorMascota')->insert([
            'descripcion' => 'Sal y pimienta'
        ]);
    }
}
