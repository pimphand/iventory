<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnloadingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $rules = [];
        switch ($this->method()) {
            case 'PUT':
                $rules = [
                    'customer_id'       => ['required', 'integer'],
                    'bongkar.waktu_datang'      => ['required', 'date_format:H:i'],
                    'bongkar.waktu_bongkar'     => ['required', 'date_format:H:i'],
                    'bongkar.tanggal_bongkar'     => ['required'],
                    'muatan.*.berat_do'          => ['required', 'numeric'],
                    'muatan.*.jumlah_ayam_do'    => ['required', 'numeric'],
                    'muatan.*.berat_timbangan'   => ['required', 'numeric'],
                    'muatan.*.jumlah_diterima'   => ['required', 'numeric'],
                    'muatan.*.berat_mati'        => ['required', 'numeric'],
                    'muatan.*.jumlah_mati'       => ['required', 'numeric'],
                    'muatan.*.berat_ditolak'     => ['required', 'numeric'],
                    'muatan.*.jumlah_ditolak'    => ['required', 'numeric'],
                    'muatan.*.berat_keranjang'   => ['required', 'numeric'],
                    'muatan.*.berat_ratarata'    => ['required', 'numeric'],

                ];
                break;
            case 'POST':
                $rules = [
                    'customer_id'                => ['required', 'integer'],
                    'bongkar.waktu_datang'       => ['required', 'date_format:H:i'],
                    'bongkar.waktu_bongkar'      => ['required', 'date_format:H:i'],
                    'bongkar.tanggal_bongkar'    => ['required'],
                    'muatan.*.berat_do'          => ['required', 'numeric'],
                    'muatan.*.jumlah_ayam_do'    => ['required', 'numeric'],
                    'muatan.*.berat_timbangan'   => ['required', 'numeric'],
                    'muatan.*.jumlah_diterima'   => ['required', 'numeric'],
                    'muatan.*.berat_mati'        => ['required', 'numeric'],
                    'muatan.*.jumlah_mati'       => ['required', 'numeric'],
                    'muatan.*.berat_ditolak'     => ['required', 'numeric'],
                    'muatan.*.jumlah_ditolak'    => ['required', 'numeric'],
                    'muatan.*.berat_keranjang'   => ['required', 'numeric'],
                    'muatan.*.berat_ratarata'    => ['required', 'numeric'],
                ];
                break;
        }
        return $rules;
    }

    public function messages()
    {
        return [
            // pesan error untuk field lainnya
            'muatan.*.berat_do.required' => 'Berat DO harus diisi',
            'muatan.*.jumlah_ayam_do.required' => 'Jumlah ayam DO harus diisi',
            'muatan.*.berat_timbangan.required' => 'Berat timbangan harus diisi',
            'muatan.*.jumlah_diterima.required' => 'Jumlah diterima harus diisi',
            'muatan.*.berat_mati.required' => 'Berat mati harus diisi',
            'muatan.*.jumlah_mati.required' => 'Jumlah mati harus diisi',
            'muatan.*.berat_ditolak.required' => 'Berat ditolak harus diisi',
            'muatan.*.jumlah_ditolak.required' => 'Jumlah ditolak harus diisi',
            'muatan.*.berat_keranjang.required' => 'Berat keranjang harus diisi',
            'muatan.*.berat_ratarata.required' => 'Berat rata-rata harus diisi',
        ];
    }
}
