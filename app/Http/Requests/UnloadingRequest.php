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
        return false;
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
                    'customer_id' => ['required', 'integer'],
                    'waktu_datang' => ['required', 'time'],
                    'waktu_bongkar' => ['required', 'time'],
                    'berat_do' => ['required', 'string', 'max:20'],
                    'jumlah_ayam_do' => ['required', 'string', 'max:20'],
                    'berat_timbangan' => ['required', 'string', 'max:20'],
                    'jumlah_diterima' => ['required', 'string', 'max:20'],
                    'berat_mati' => ['required', 'string', 'max:20'],
                    'jumlah_mati' => ['required', 'string', 'max:20'],
                    'berat_ditolak' => ['required', 'string', 'max:20'],
                    'jumlah_ditolak' => ['required', 'string', 'max:20'],
                    'berat_keranjang' => ['required', 'string', 'max:20'],
                    'berat_ratarata' => ['required', 'string', 'max:20'],

                ];
                break;
            case 'POST':
                $rules = [
                    'customer_id' => ['required', 'integer'],
                    'waktu_datang' => ['required', 'time'],
                    'waktu_bongkar' => ['required', 'time'],
                    'berat_do' => ['required', 'string', 'max:20'],
                    'jumlah_ayam_do' => ['required', 'string', 'max:20'],
                    'berat_timbangan' => ['required', 'string', 'max:20'],
                    'jumlah_diterima' => ['required', 'string', 'max:20'],
                    'berat_mati' => ['required', 'string', 'max:20'],
                    'jumlah_mati' => ['required', 'string', 'max:20'],
                    'berat_ditolak' => ['required', 'string', 'max:20'],
                    'jumlah_ditolak' => ['required', 'string', 'max:20'],
                    'berat_keranjang' => ['required', 'string', 'max:20'],
                    'berat_ratarata' => ['required', 'string', 'max:20'],
                ];
                break;
        }
        return $rules;
    }
}
