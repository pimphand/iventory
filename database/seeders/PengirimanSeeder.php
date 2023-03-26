<?php

namespace Database\Seeders;

use App\Models\Pengiriman;
use App\Models\User;
use App\Models\Unloading;
use App\Models\Proses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengirimanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         $user = collect(User::all()->modelKeys());
         $unloading = collect(Unloading::all()->modelKeys());
         $proses = collect(Proses::all()->modelKeys());
         $data = [];
         for ($i=0; $i <=100; $i++) {
            $data[] = [
                'customer_id' => $user->random(),
                'unloading_id' => $unloading->random(),
                'proses_id' => $proses->random(),
                'waktu_kirim' => now(),
                'berat_kirim' => $i." Kg",
                'jumlah_kirim' => $i." item",
                'created_at'=> now(),
                'updated_at'=> now()
            ];
         }

         Pengiriman::insert($data);

    }
}
