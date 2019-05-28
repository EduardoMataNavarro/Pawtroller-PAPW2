<?php

use Illuminate\Database\Seeder;

class StatusMascotasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('status_mascotas')->insert([
            'descripcion' => 'En casa',
        ]);
        DB::table('status_mascotas')->insert([
            'descripcion' => 'Perdido',
        ]);
        DB::table('status_mascotas')->insert([
            'descripcion' => 'Difunto',
        ]);
    }
}
