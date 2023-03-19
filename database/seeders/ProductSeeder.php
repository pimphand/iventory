<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 100000; $i++) {
            Product::insert([
                'name' => "product-" . $i,
                'category_id' => fake()->numberBetween(1, 20),
            ]);
        }
    }
}
