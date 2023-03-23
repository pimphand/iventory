<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) {
            Customer::create([
                "nama" => "nama-" . $i + 1,
                "email" => "email-" . $i + 1,
                "telepon" => "telepon-" . $i + 1,
                "alamat" => "alamat-" . $i + 1,
            ]);
        }
    }
}
