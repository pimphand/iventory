<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
                    'nama' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255'],
                    'telepon' => ['required', 'string', 'max:255'],
                    'alamat' => ['required', 'string', 'max:255'],

                ];
                break;
            case 'POST':
                $rules = [
                    'nama' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255'],
                    'telepon' => ['required', 'string', 'max:255'],
                    'alamat' => ['required', 'string', 'max:255'],
                ];
                break;
        }
        return $rules;
    }
}
