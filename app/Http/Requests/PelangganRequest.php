<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class PelangganRequest extends FormRequest
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
            'pelanggan' => 'required|string|max:255',
            'telp' => 'nullable|string|max:30',
            'email' => 'nullable|email|max:255',
            'alamat' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'pelanggan.required' => 'Nama pelanggan wajib diisi.',
            'pelanggan.max' => 'Nama pelanggan tidak boleh lebih dari :max karakter.',

            'telp.required' => 'No telpon wajib diisi.',
            'telp.max' => 'Nomor telepon tidak boleh lebih dari :max karakter.',
            'telp.numeric' => 'Nomor telepon harus berupa angka.',

            'email.email' => 'Format email tidak valid.',
            'email.required' => 'Email wajib diisi.',
            'email.max' => 'Email tidak boleh lebih dari :max karakter.',
            'email.unique' => 'Email sudah terdaftar.',

            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.max' => 'Alamat tidak boleh lebih dari :max karakter.',


        ];
    }
}
