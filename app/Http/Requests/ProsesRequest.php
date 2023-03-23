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
                    'unloading_id' => ['required', 'integer'],
                    'waktu_mulai' => ['required', 'date_format:H:i'],
                    'waktu_selesai' => ['required', 'date_format:H:i'],
                    'tipe_produk' => ['required', 'string', 'max:20'],
                    'grade' => ['required', 'string', 'max:20'],
                    'berat_produk' => ['required', 'string', 'max:20'],
                    'jumlah_produk' => ['required', 'string', 'max:20'],
                    'randemen' => ['required', 'string', 'max:20'],
                    'berat_gagal' => ['required', 'string', 'max:20'],
                    'jumlah_gagal' => ['required', 'string', 'max:20'],

                ];
                break;
            case 'POST':
                $rules = [
                    'customer_id' => ['required', 'integer'],
                    'unloading_id' => ['required', 'integer'],
                    'waktu_mulai' => ['required', 'date_format:H:i'],
                    'waktu_selesai' => ['required', 'date_format:H:i'],
                    'tipe_produk' => ['required', 'string', 'max:20'],
                    'grade' => ['required', 'string', 'max:20'],
                    'berat_produk' => ['required', 'string', 'max:20'],
                    'jumlah_produk' => ['required', 'string', 'max:20'],
                    'randemen' => ['required', 'string', 'max:20'],
                    'berat_gagal' => ['required', 'string', 'max:20'],
                    'jumlah_gagal' => ['required', 'string', 'max:20'],
                ];
                break;
        }
        return $rules;
    }
}
