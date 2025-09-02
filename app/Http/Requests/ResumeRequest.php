<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResumeRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'desired_job' => 'required',
            'education' => 'required',
            'observations' => 'string|nullable',
            'file' => 'required|file|mimes:pdf,doc,docx|max:1024',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome é obrigatório',
            'email.required' => 'O email é obrigatório',
            'email.email' => 'O email deve ser válido',
            'phone.required' => 'O telefone é obrigatório',
            'desired_job.required' => 'O cargo desejado é obrigatório',
            'education.required' => 'A escolaridade é obrigatória',
            'observations.string' => 'As observações devem ser um texto',
            'file.required' => 'O arquivo é obrigatório',
            'file.file' => 'O arquivo deve ser válido',
            'file.mimes' => 'O arquivo deve ser um PDF, DOC ou DOCX',
            'file.max' => 'O arquivo deve ter no máximo 1024KB(1MB)',
        ];
    }
}
