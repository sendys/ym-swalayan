<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class SatuanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'satuan' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'satuan.required' => 'Nama satuan wajib diisi.',
            'satuan.max' => 'Nama satuan tidak boleh lebih dari :max karakter.',
        ];
    }
}
