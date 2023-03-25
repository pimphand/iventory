<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProsesRequest extends FormRequest
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
                    'customer_id' => ['required', 'integer'],
                    'unloading_id' => ['required', 'integer'],
                    'waktu_mulai' => ['required', 'date_format:H:i'],
                    'waktu_selesai' => ['required', 'date_format:H:i'],
                    'tipe_produk' => ['required', 'string'],
                    'grade' => ['required'],
                    'berat_produk' => ['required', 'numeric'],
                    'jumlah_produk' => ['required', 'numeric'],
                    'randemen' => ['required', 'numeric'],
                    'berat_gagal' => ['required', 'numeric'],
                    'jumlah_gagal' => ['required', 'numeric'],

                ];
                break;
            case 'POST':
                $rules = [
                    'customer_id' => ['required', 'integer'],
                    'unloading_id' => ['required', 'integer'],
                    'waktu_mulai' => ['required', 'date_format:H:i'],
                    'waktu_selesai' => ['required', 'date_format:H:i'],
                    'tipe_produk' => ['required', 'string'],
                    'grade' => ['required'],
                    'berat_produk' => ['required', 'numeric'],
                    'jumlah_produk' => ['required', 'numeric'],
                    'randemen' => ['required', 'numeric'],
                    'berat_gagal' => ['required', 'numeric'],
                    'jumlah_gagal' => ['required', 'numeric'],
                ];
                break;
        }
        return $rules;
    }
}
