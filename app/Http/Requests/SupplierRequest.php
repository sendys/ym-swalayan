<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            'supplier' => 'required|string|max:255',
            'telp' => 'required|string|max:30',
            'email' => 'required|email|max:255',
            'alamat' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'supplier.required' => 'Nama supplier wajib diisi.',
            'supplier.max' => 'Nama supplier tidak boleh lebih dari :max karakter.',

            'telp.required' => 'No telpon wajib diisi.',
            'telp.max' => 'Nomor telepon tidak boleh lebih dari :max karakter.',
            'telp.numeric' => 'Nomor telepon harus berupa angka.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',

            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.max' => 'Alamat tidak boleh lebih dari :max karakter.',


        ];
    }
}
