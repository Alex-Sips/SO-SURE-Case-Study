<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'username.required' => 'Please enter your username',
            'password.required' => 'Please enter your password',
        ];
    }

    public function validLogin()
    {
        return User::where('username', $this->username)->where('password', $this->password)->exists();
    }

    public function getUser()
    {
        return User::where('username', $this->username)->first();
    }
}
