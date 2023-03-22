<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Unloading;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnloadingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customer = collect(Customer::all()->modelKeys());
        $data = [];
        for ($i = 0; $i < 100000; $i++) {
            $data[] = [
                "id" => $i + 1,
                'customer_id' => $customer->random(),
                "waktu_datang" => now(),
                "waktu_bongkar" => now(),
                "berat_do" => "berat_do-" . $i + 1,
                "jumlah_ayam_do" => "jumlah_ayam_do-" . $i + 1,
                "berat_timbangan" => "berat_timbangan-" . $i + 1,
                "jumlah_diterima" => "jumlah_diterima-" . $i + 1,
                "berat_mati" => "berat_mati-" . $i + 1,
                "jumlah_mati" => "jumlah_mati-" . $i + 1,
                "berat_ditolak" => "berat_ditolak-" . $i + 1,
                "jumlah_ditolak" => "jumlah_ditolak-" . $i + 1,
                "berat_keranjang" => "berat_keranjang-" . $i + 1,
                "berat_ratarata" => "berat_ratarata-" . $i + 1,
                'created_at' => now(),
                'updated_at' => now()
            ];

        }

        foreach (array_chunk($data, 1000) as $chunk) {
            Customer::insert($chunk);
        }
    }
}
