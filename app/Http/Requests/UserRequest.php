<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
                $id =  request()->route()->parameter('user.id');
                $rules = [
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)->ignore($id)],
                    'telepon' => ['required', 'string', 'max:255', Rule::unique(User::class)->ignore($id)],
                    'username' => ['required', 'string', 'max:255',],
                    'password' => ['nullable', Rules\Password::defaults()],
                    'jabatan'=>['required']
                ];
                break;

            case 'POST':
                $rules = [
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
                    'telepon' => ['required', 'string', 'max:255', 'unique:' . User::class],
                    'username' => ['required', 'string', 'max:255', 'unique:' . User::class],
                    'password' => ['required', Rules\Password::defaults()],
                    'jabatan'=>['required']
                ];
                break;
        }
        return $rules;
    }
}
