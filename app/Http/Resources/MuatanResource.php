<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MuatanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "berat_do" => $this->berat_do,
            "jumlah_ayam_do" => $this->jumlah_ayam_do,
            "berat_timbangan" => $this->berat_timbangan,
            "jumlah_diterima" => $this->jumlah_diterima,
            "berat_mati" => $this->berat_mati,
            "jumlah_mati" => $this->jumlah_mati,
            "berat_ditolak" => $this->berat_ditolak,
            "jumlah_ditolak" => $this->jumlah_ditolak,
            "berat_keranjang" => $this->berat_keranjang,
            "berat_ratarata" => $this->berat_ratarata,
            "waktu_datang" => $this->waktu_datang,
            "waktu_bongkar" => $this->waktu_bongkar,
            "waktu_selesai" => $this->waktu_selesai,
            "kendaraan" => $this->kendaraan,
        ];
    }
}
