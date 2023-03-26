<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PengirimanRequest extends FormRequest
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
                    'proses_id' => ['required', 'integer'],
                    'waktu_kirim' => ['required','date_format:H:i'],
                    'berat_kirim' => ['required','string','max:20'],
                    'jumlah_kirim' => ['required','string','max:20']

                ];
                break;
            case 'POST':
                $rules = [
                    'customer_id' => ['required', 'integer'],
                    'unloading_id' => ['required', 'integer'],
                    'proses_id' => ['required', 'integer'],
                    'waktu_kirim' => ['required','date_format:H:i'],
                    'berat_kirim' => ['required','string','max:20'],
                    'jumlah_kirim' => ['required','string','max:20']
                ];
                break;
        }
        return $rules;
    }
}
