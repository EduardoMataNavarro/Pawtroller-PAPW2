<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(RolTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ColorMascotaSeeder::class);
        $this->call(RazaTableSeeder::class);
        $this->call(StatusMascotasTableSeeder::class);
        $this->call(MascotaTableSeeder::class);
        $this->call(categoriaPublicacionSeeder::class);
        $this->call(PublicacionTableSeeder::class);
        $this->call(ComentarioTableSeeder::class);
    }
}
