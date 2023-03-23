<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "root", 'admin', 'operator', 'supervisor'
        ];

        foreach ($data as $key => $role) {
            $access = Role::create([
                'name' => $key
            ]);

            User::create([
                'username' => $key,
                'name' => $key,
                'telepon' => rand(1000, 9999),
                'jabatan' => $key,
                'role_id' => $access->id,
                'email' => $key . "@gmail.com",
                'password' => Hash::make('password'),
            ]);
        }
    }
}
