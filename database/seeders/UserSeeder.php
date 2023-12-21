<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'username' => "username-" . $i,
                'name' => "name-" . $i,
                'telepon' => "telepon-" . $i,
                'jabatan' => "jabatan-" . $i,
                'role_id' => $i,
                'email' => "email-" . $i,
                'password' => "password-" . $i,
            ]);
        }
    }
}
