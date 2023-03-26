<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SampinganRequest extends FormRequest
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
                    'berat_kepala_leher' => ['required', 'numeric'],
                    'prosentase_kepala_leher' => ['required', 'numeric'],
                    'berat_kepala_tanpa_leher' => ['required', 'numeric'],
                    'prosentase_kepala_tanpa_leher' => ['required', 'numeric'],
                    'berat_usus' => ['required', 'numeric'],
                    'prosentase_usus' => ['required', 'numeric'],
                    'berat_hja' => ['required', 'numeric'],
                    'prosentase_hja' => ['required', 'numeric'],
                    'berat_ceker' => ['required', 'numeric'],
                    'prosentase_ceker' => ['required', 'numeric'],
                    'berat_tembolok' => ['required', 'numeric'],
                    'prosentase_tembolok' => ['required', 'numeric'],

                ];
                break;
            case 'POST':
                $rules = [
                    'customer_id' => ['required', 'integer'],
                    'unloading_id' => ['required', 'integer'],
                    'proses_id' => ['required', 'integer'],
                    'berat_kepala_leher' => ['required', 'numeric'],
                    'prosentase_kepala_leher' => ['required', 'numeric'],
                    'berat_kepala_tanpa_leher' => ['required', 'numeric'],
                    'prosentase_kepala_tanpa_leher' => ['required', 'numeric'],
                    'berat_usus' => ['required', 'numeric'],
                    'prosentase_usus' => ['required', 'numeric'],
                    'berat_hja' => ['required', 'numeric'],
                    'prosentase_hja' => ['required', 'numeric'],
                    'berat_ceker' => ['required', 'numeric'],
                    'prosentase_ceker' => ['required', 'numeric'],
                    'berat_tembolok' => ['required', 'numeric'],
                    'prosentase_tembolok' => ['required', 'numeric'],
                ];
                break;
        }
        return $rules;
    }
}
