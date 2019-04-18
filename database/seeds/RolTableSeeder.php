<?php

use Illuminate\Database\Seeder;
use App\Rol;

class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('rol')->insert([
            'descripcion' => 'Aministrador',
            'relevancia' => 4
        ]);
        DB::table('rol')->insert([
            'descripcion' => 'Moderador',
            'relevancia' => 3
        ]);
        DB::table('rol')->insert([
            'descripcion' => 'Usuario',
            'relevancia' => 2
        ]);
        DB::table('rol')->insert([
            'descripcion' => 'Invitado',
            'relevancia' => 1
        ]);
        DB::table('rol')->insert([
            'descripcion' => 'Bloqueado',
            'relevancia' => 0
        ]);
    }
}
