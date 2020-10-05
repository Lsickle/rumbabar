<?php

use Illuminate\Database\Seeder;
use App\Producto;

class CompraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Compra::class, 300)->create()->each(function ($compra){
            $faker = Faker\Factory::create();
            $productos = Producto::all();
            $numProductos = $faker->numberBetween($min = 2, $max = 10);
            // Seed the relation with random producto
            foreach ($productos->random($numProductos) as $key => $producto) {
                $compra->productos()->attach($producto->ProductoId, ['compraCantidad' => ($faker->numberBetween($min = 10, $max = 1000)*100)]);
            }
        });
    }
}
