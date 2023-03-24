<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Proses;
use App\Models\Unloading;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProsesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customer = collect(Customer::all()->modelKeys());
        $unloading = collect(Unloading::all()->modelKeys());
        $data = [];
        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                "id" => $i + 1,
                // 'customer_id' => $i +1 ,
                'customer_id' => $customer->random(),
                'unloading_id' => $unloading->random(),
                "waktu_mulai" => now(),
                "waktu_selesai" => now(),
                "tipe_produk" => "tipe_produk-" . $i + 1,
                "grade" => "grade-" . $i + 1,
                "berat_produk" => "berat_produk-" . $i + 1,
                "jumlah_produk" => "jumlah_produk-" . $i + 1,
                "randemen" => "randemen-" . $i + 1,
                "berat_gagal" => "berat_gagal-" . $i + 1,
                "jumlah_gagal" => "jumlah_gagal-" . $i + 1,
                'created_at' => now(),
                'updated_at' => now()
            ];

        }

        foreach (array_chunk($data, 100) as $chunk) {
            Proses::insert($chunk);
        }
    }
}
