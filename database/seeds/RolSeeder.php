<?php

use Illuminate\Database\Seeder;
use App\Rol;
use App\Permiso;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
        $permission = Permission::all();
        $role = Role::create(['name' => 'Programador']);
        $role->givePermissionTo($permission);
        $role = Role::create(['name' => 'Administrador']);
        $role->givePermissionTo($permission);
        $role = Role::create(['name' => 'Usuario']);
        $role->givePermissionTo($permission->random(10));
        $role = Role::create(['name' => 'Suplente']);
        $role->givePermissionTo($permission->random(10));
    }
}
