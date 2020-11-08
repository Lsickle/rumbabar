<?php

use Illuminate\Database\Seeder;
use App\Rol;
use App\Permiso;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = Permiso::all('PermisoId');
        $nuevoRol = Rol::create(['RolNombre' => 'Programador'])->each(function ($nuevoRol) use ($permisos) {
            $nuevoRol->permisos()->sync($permisos->random(10));
        });

        $nuevoRol = Rol::create(['RolNombre' => 'Administrador'])->each(function ($nuevoRol) use ($permisos) {
            $nuevoRol->permisos()->sync($permisos->random(10));
        });

        $nuevoRol = Rol::create(['RolNombre' => 'Usuario'])->each(function ($nuevoRol) use ($permisos) {
            $nuevoRol->permisos()->sync($permisos->random(10));
        });

        $nuevoRol = Rol::create(['RolNombre' => 'Suplente'])->each(function ($nuevoRol) use ($permisos) {
            $nuevoRol->permisos()->sync($permisos->random(10));
        });
    }
}
