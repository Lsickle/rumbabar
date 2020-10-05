<?php

use Illuminate\Database\Seeder;

class VentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Venta::class, 300)->create()->each(function ($compra){
            $faker = Faker\Factory::create();
            $productos = App\Producto::all();
            $numProductos = $faker->numberBetween($min = 2, $max = 10);
            // Seed the relation with random producto
            foreach ($productos->random($numProductos) as $key => $producto) {
                $compra->productos()->attach($producto->ProductoId, ['ventaCantidad' => ($faker->numberBetween($min = 10, $max = 1000)*100)]);
            }
        });
    }
}
