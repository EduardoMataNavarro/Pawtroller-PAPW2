<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Admin',
            'apellido' => 'Admin Aministrador',
            'nickname' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123'),
            'id_rol' => 4
        ]);
        
        DB::table('users')->insert([
            'name' => 'Javer',
            'apellido' => 'Tovar Rigoberto',
            'nickname' => 'RigoTovar',
            'email' => 'rigoTovar@admin.com',
            'password' => bcrypt('rigo123'),
            'id_rol' => 3
        ]);
        DB::table('users')->insert([
            'name' => 'Eduardo',
            'apellido' => 'Mata Navarro',
            'nickname' => 'EdwardBot5000',
            'email' => 'ed_ward98_ed@hotmail.com',
            'password' => bcrypt('edward123'),
            'id_rol' => 2
        ]);
        DB::table('users')->insert([
            'name' => 'Carlos',
            'apellido' => 'Gutierrez Salinas',
            'nickname' => 'Tito',
            'email' => 'Tito.1998@hotmail.com',
            'password' => bcrypt('Tito123'),
            'id_rol' => 2
        ]);
    }
}
