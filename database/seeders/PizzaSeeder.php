<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pizzas = [
            ['nombre' => 'Pizza Margarita', 'precio' => 8.99],
            ['nombre' => 'Pizza Pepperoni', 'precio' => 9.99],
            ['nombre' => 'Pizza Hawaiana', 'precio' => 10.99],
            // Agrega más datos de ejemplo según sea necesario
        ];

        // Insertar datos en la tabla de pizzas
        DB::table('pizzas')->insert($pizzas);
    }
}
