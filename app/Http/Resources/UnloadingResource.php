<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UnloadingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "tanggal_datang" => $this->tanggal_datang,
            "tanggal" => $this->tanggal,
            "kendaraan" => $this->kendaraan,
            "tanggal_bongkar" => $this->tanggal_bongkar,
            "customer" => new CustomerResource($this->whenLoaded('customer')),
            "muatan" => MuatanResource::collection($this->whenLoaded('muatan')),
        ];
    }
}
