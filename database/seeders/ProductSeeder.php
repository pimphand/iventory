<?php

namespace Database\Seeders;

use App\Models\Category;
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
        $category = collect(Category::all()->modelKeys());
        $data = [];

        for ($i = 0; $i < 100000; $i++) {
            $data[] = [
                'name' => "product-" . $i,
                'category_id' => $category->random(),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        foreach (array_chunk($data, 100) as $chunk) {
            Product::insert($chunk);
        }
    }
}
