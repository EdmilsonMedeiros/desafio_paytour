<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'O campo de email é obrigatório.',
            'email.email' => 'O campo de email deve ser um endereço de email válido.',
            'email.exists' => 'O campo de email deve ser um endereço de email válido.',
            'password.required' => 'O campo de senha é obrigatório.',
            'password.min' => 'O campo de senha deve ter pelo menos 6 caracteres.',
        ];
    }
}