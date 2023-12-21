<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProsesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "waktu_mulai" => $this->waktu_mulai,
            "waktu_selesai" => $this->waktu_selesai,
            "tipe_produk" => $this->tipe_produk,
            "grade" => $this->grade,
            "berat_produk" => $this->berat_produk,
            "jumlah_produk" => $this->jumlah_produk,
            "randemen" => $this->randemen,
            "berat_gagal" => $this->berat_gagal,
            "jumlah_gagal" => $this->jumlah_gagal,
            "customer" => new CustomerResource($this->whenLoaded('customer')),
            "unloading" => new UnloadingResource($this->whenLoaded('unloading')),
        ];
    }
}
