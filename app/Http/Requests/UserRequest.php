<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Pastikan ini return true jika semua pengguna bisa mengakses
    }

    public function rules()
    {
        return [
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:10',
            'kelas_id' => 'required|exists:kelas,id',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama wajib diisi.',
            'npm.required' => 'NPM wajib diisi.',
            'kelas_id.required' => 'Kelas wajib dipilih.',
            'kelas_id.exists' => 'Kelas yang dipilih tidak valid.',
        ];
    }
}
