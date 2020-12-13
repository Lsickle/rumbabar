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
        $this->call([
            PermisoSeeder::class,
            RolSeeder::class,
            UserSeeder::class,
            ProveedorSeeder::class,
            ProductoSeeder::class,
            CompraSeeder::class,
            MesaSeeder::class,
            ClienteSeeder::class,
            VentaSeeder::class,
        ]);
    }
}
