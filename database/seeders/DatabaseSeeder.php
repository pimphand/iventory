<?php

namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * Seed the application's database.
     */

    public function run(): void
    {
        // \App\Models\User::factory()->create([
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'email' => 'test@example.com',
        // ]);
        // ]);
        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory(10)->create();


        $this->call([
            RoleSeeder::class,
            CustomerSeeder::class
        ]);
    }
}
