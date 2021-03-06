<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Permiso;
use Spatie\Permission\Models\Permission;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
$modelos = [
    'Cliente',
    'Compra',
    'Rol',
    'Permiso',
    'Usuario',
    'Producto',
    'Proveedor',
    'Venta',
    'Mesa',
];
$funciones = [
    'create',
    'read',
    'update',
    'delete',
];
$array=[];
foreach ($modelos as $key => $value) {
    foreach ($funciones as $key2 => $value2) {
        $array == array_push($array, $value.$value2);
        $permission = Permission::create(['name' => $value.$value2]);
    }
}

$factory->define(Permiso::class, function (Faker $faker) use ($array) {
    return [
        'PermisoNombre' => $faker->randomElement($array),
        'created_at' => $faker->dateTimeBetween('2020-08-15', '2020-09-01')->format('Y-m-d H:i:s'),
        'updated_at' => $faker->dateTimeBetween('2020-09-01', '2020-10-07')->format('Y-m-d H:i:s'),
    ];
});
