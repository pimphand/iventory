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
                    'tanggal_bongkar'    => ['required'],
                    // update
                    'update.*.waktu_datang'      => ['required', 'date_format:H:i'],
                    'update.*.waktu_bongkar'     => ['required', 'date_format:H:i', 'after:update.*.waktu_datang'],
                    'update.*.berat_do'          => ['required', 'numeric'],
                    'update.*.jumlah_ayam_do'    => ['required', 'numeric'],
                    'update.*.berat_timbangan'   => ['required', 'numeric'],
                    'update.*.jumlah_diterima'   => ['required', 'numeric'],
                    'update.*.berat_mati'        => ['required', 'numeric'],
                    'update.*.jumlah_mati'       => ['required', 'numeric'],
                    'update.*.berat_ditolak'     => ['required', 'numeric'],
                    'update.*.jumlah_ditolak'    => ['required', 'numeric'],
                    'update.*.berat_keranjang'   => ['required', 'numeric'],
                    'update.*.berat_ratarata'    => ['required', 'numeric'],
                    // create
                    'muatan.*.waktu_datang'       => ['required_if:update.0.waktu_datang,null,date_format:H:i'],
                    'muatan.*.waktu_bongkar'      => ['required_if:update.0.waktu_bongkar,null,date_format:H:i,after:muatan.*.waktu_datang'],
                    'muatan.*.berat_do'           => ['required_if:update.0.berat_do,null,numeric'],
                    'muatan.*.jumlah_ayam_do'     => ['required_if:update.0.jumlah_ayam_do,null,numeric'],
                    'muatan.*.berat_timbangan'    => ['required_if:update.0.berat_timbangan,null,numeric'],
                    'muatan.*.jumlah_diterima'    => ['required_if:update.0.jumlah_diterima,null,numeric'],
                    'muatan.*.berat_mati'         => ['required_if:update.0.berat_mati,null,numeric'],
                    'muatan.*.jumlah_mati'        => ['required_if:update.0.jumlah_mati,null,numeric'],
                    'muatan.*.berat_ditolak'      => ['required_if:update.0.berat_ditolak,null,numeric'],
                    'muatan.*.jumlah_ditolak'     => ['required_if:update.0.jumlah_ditolak,null,numeric'],
                    'muatan.*.berat_keranjang'    => ['required_if:update.0.berat_keranjang,null,numeric'],
                    'muatan.*.berat_ratarata'     => ['required_if:update.0.berat_ratarata,null,numeric'],
                ];
                break;
            case 'POST':
                $rules = [
                    'customer_id'                 => ['required', 'integer'],
                    'tanggal_bongkar'             => ['required'],
                    'muatan.*.waktu_datang'       => ['required', 'date_format:H:i'],
                    'muatan.*.waktu_bongkar'      => ['required', 'date_format:H:i', 'after:muatan.*.waktu_datang'],
                    'muatan.*.berat_do'           => ['required', 'numeric'],
                    'muatan.*.jumlah_ayam_do'     => ['required', 'numeric'],
                    'muatan.*.berat_timbangan'    => ['required', 'numeric'],
                    'muatan.*.jumlah_diterima'    => ['required', 'numeric'],
                    'muatan.*.berat_mati'         => ['required', 'numeric'],
                    'muatan.*.jumlah_mati'        => ['required', 'numeric'],
                    'muatan.*.berat_ditolak'      => ['required', 'numeric'],
                    'muatan.*.jumlah_ditolak'     => ['required', 'numeric'],
                    'muatan.*.berat_keranjang'    => ['required', 'numeric'],
                    'muatan.*.berat_ratarata'     => ['required', 'numeric'],
                ];
                break;
        }
        return $rules;
    }

    public function messages()
    {
        return [
            // pesan error untuk field lainnya
            'muatan.*.berat_do.required'        => 'Berat DO harus diisi',
            'muatan.*.waktu_datang.required'    => 'Waktu datang harus diisi',
            'muatan.*.waktu_bongkar.required'   => 'Waktu bongkar harus diisi',
            'muatan.*.jumlah_ayam_do.required'  => 'Jumlah ayam DO harus diisi',
            'muatan.*.berat_timbangan.required' => 'Berat timbangan harus diisi',
            'muatan.*.jumlah_diterima.required' => 'Jumlah diterima harus diisi',
            'muatan.*.berat_mati.required'      => 'Berat mati harus diisi',
            'muatan.*.jumlah_mati.required'     => 'Jumlah mati harus diisi',
            'muatan.*.berat_ditolak.required'   => 'Berat ditolak harus diisi',
            'muatan.*.jumlah_ditolak.required'  => 'Jumlah ditolak harus diisi',
            'muatan.*.berat_keranjang.required' => 'Berat keranjang harus diisi',
            'muatan.*.berat_ratarata.required'  => 'Berat rata-rata harus diisi',
            'muatan.*.waktu_bongkar.after'      => 'Waktu bongkar harus lebih besar dari waktu datang.',
            // 
            'muatan.*.berat_do.required_if'        => 'Berat DO harus diisi',
            'muatan.*.waktu_datang.required_if'    => 'Waktu datang harus diisi',
            'muatan.*.waktu_bongkar.required_if'   => 'Waktu bongkar harus diisi',
            'muatan.*.jumlah_ayam_do.required_if'  => 'Jumlah ayam DO harus diisi',
            'muatan.*.berat_timbangan.required_if' => 'Berat timbangan harus diisi',
            'muatan.*.jumlah_diterima.required_if' => 'Jumlah diterima harus diisi',
            'muatan.*.berat_mati.required_if'      => 'Berat mati harus diisi',
            'muatan.*.jumlah_mati.required_if'     => 'Jumlah mati harus diisi',
            'muatan.*.berat_ditolak.required_if'   => 'Berat ditolak harus diisi',
            'muatan.*.jumlah_ditolak.required_if'  => 'Jumlah ditolak harus diisi',
            'muatan.*.berat_keranjang.required_if' => 'Berat keranjang harus diisi',
            'muatan.*.berat_ratarata.required_if'  => 'Berat rata-rata harus diisi',
            'muatan.*.waktu_bongkar.after'      => 'Waktu bongkar harus lebih besar dari waktu datang.',
            // update
            'update.*.berat_do.required'        => 'Berat DO harus diisi',
            'update.*.waktu_datang.required'    => 'Waktu datang harus diisi',
            'update.*.waktu_bongkar.required'   => 'Waktu bongkar harus diisi',
            'update.*.jumlah_ayam_do.required'  => 'Jumlah ayam DO harus diisi',
            'update.*.berat_timbangan.required' => 'Berat timbangan harus diisi',
            'update.*.jumlah_diterima.required' => 'Jumlah diterima harus diisi',
            'update.*.berat_mati.required'      => 'Berat mati harus diisi',
            'update.*.jumlah_mati.required'     => 'Jumlah mati harus diisi',
            'update.*.berat_ditolak.required'   => 'Berat ditolak harus diisi',
            'update.*.jumlah_ditolak.required'  => 'Jumlah ditolak harus diisi',
            'update.*.berat_keranjang.required' => 'Berat keranjang harus diisi',
            'update.*.berat_ratarata.required'  => 'Berat rata-rata harus diisi',
            'update.*.waktu_bongkar.after'      => 'Waktu bongkar harus lebih besar dari waktu datang.',
            'tanggal_bongkar.required'          => 'Tanggal bongkar harus diisi',
            // 
            'update.*.berat_do.numeric'        => 'Berat DO harus berupa angka',
            'update.*.waktu_datang.numeric'    => 'Waktu datang harus berupa angka',
            'update.*.waktu_bongkar.numeric'   => 'Waktu bongkar harus berupa angka',
            'update.*.jumlah_ayam_do.numeric'  => 'Jumlah ayam DO harus berupa angka',
            'update.*.berat_timbangan.numeric' => 'Berat timbangan harus berupa angka',
            'update.*.jumlah_diterima.numeric' => 'Jumlah diterima harus berupa angka',
            'update.*.berat_mati.numeric'      => 'Berat mati harus berupa angka',
            'update.*.jumlah_mati.numeric'     => 'Jumlah mati harus berupa angka',
            'update.*.berat_ditolak.numeric'   => 'Berat ditolak harus berupa angka',
            'update.*.jumlah_ditolak.numeric'  => 'Jumlah ditolak harus berupa angka',
            'update.*.berat_keranjang.numeric' => 'Berat keranjang harus berupa angka',
            'update.*.berat_ratarata.numeric'  => 'Berat rata-rata harus berupa angka',
            // crete
            'muatan.*.berat_do.numeric'        => 'Berat DO harus berupa angka',
            'muatan.*.waktu_datang.numeric'    => 'Waktu datang harus berupa angka',
            'muatan.*.waktu_bongkar.numeric'   => 'Waktu bongkar harus berupa angka',
            'muatan.*.jumlah_ayam_do.numeric'  => 'Jumlah ayam DO harus berupa angka',
            'muatan.*.berat_timbangan.numeric' => 'Berat timbangan harus berupa angka',
            'muatan.*.jumlah_diterima.numeric' => 'Jumlah diterima harus berupa angka',
            'muatan.*.berat_mati.numeric'      => 'Berat mati harus berupa angka',
            'muatan.*.jumlah_mati.numeric'     => 'Jumlah mati harus berupa angka',
            'muatan.*.berat_ditolak.numeric'   => 'Berat ditolak harus berupa angka',
            'muatan.*.jumlah_ditolak.numeric'  => 'Jumlah ditolak harus berupa angka',
            'muatan.*.berat_keranjang.numeric' => 'Berat keranjang harus berupa angka',
            'muatan.*.berat_ratarata.numeric'  => 'Berat rata-rata harus berupa angka',

            'muatan.*.waktu_bongkar.date_format'        => 'Waktu bongkar harus berupa jam dan menit',
            'muatan.*.waktu_datang.date_format'    => 'Waktu datang harus berupa jam dan menit',
            'muatan.*.waktu_bongkar.after'    => 'Waktu bongkar harus lebih besar dari waktu datang',
        ];
    }
}
