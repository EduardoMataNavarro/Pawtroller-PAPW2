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
        $rol_admin = new Rol();
        $rol_admin->descripcion = "Administrador";
        $rol_admin->relevancia = 3;

        $rol_moderador = new Rol();
        $rol_moderador->descripcion = "Moderador";
        $rol_moderador->relevancia = 2;

        $rol_invitado = new Rol();
        $rol_invitado->descripcion = "Invitado";
        $rol_admin->relevancia = 1;

        $rol_banneado = new Rol();
        $rol_banneado->descripcion = "Bloqueado";
        $rol_banneado->relevancia = 0;
    }
}
