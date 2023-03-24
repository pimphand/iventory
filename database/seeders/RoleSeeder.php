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
                'name' => $role
            ]);

            User::create([
                'username' => $role,
                'name' => $role,
                'telepon' => rand(1000000, 9999999),
                'jabatan' => $role,
                'role_id' => json_encode($role),
                'email' => $role . "@gmail.com",
                'password' => Hash::make('password'),
            ]);
        }
    }
}
