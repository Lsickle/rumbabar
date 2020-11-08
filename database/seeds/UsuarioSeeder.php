<?php

use Illuminate\Database\Seeder;
use App\Rol;
use App\Usuario;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Usuario::class, 5)->create();
    }
}
