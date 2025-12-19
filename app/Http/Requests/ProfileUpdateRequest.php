<?php
// app/Http/Requests/ProfileUpdateRequest.php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Tentukan apakah user boleh mengirim request ini
     */
    public function authorize(): bool
    {
        return true; // semua user login boleh update profil
    }

    /**
     * Prepare data sebelum validasi
     * Contoh: otomatis lowercase email
     */
    protected function prepareForValidation()
    {
        if ($this->has('email')) {
            $this->merge([
                'email' => strtolower($this->email),
            ]);
        }
    }

    /**
     * Aturan validasi
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
            'phone' => [
                'nullable',
                'string',
                'max:20',
                'regex:/^(\+62|62|0)8[1-9][0-9]{6,10}$/',
            ],
            'address' => [
                'nullable',
                'string',
                'max:500',
            ],
            'avatar' => [
                'nullable',
                'image',
                'mimes:jpeg,jpg,png,webp',
                'max:2048',
                'dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
            ],
        ];
    }

    /**
     * Pesan error khusus (Bahasa Indonesia)
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama wajib diisi.',
            'name.string' => 'Nama harus berupa teks.',
            'name.max' => 'Nama maksimal 255 karakter.',

            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Alamat email tidak valid.',
            'email.unique' => 'Email ini sudah digunakan oleh pengguna lain.',

            'phone.regex' => 'Format nomor telepon tidak valid. Gunakan format 08xx atau +628xx.',
            'phone.max' => 'Nomor telepon maksimal 20 karakter.',

            'address.string' => 'Alamat harus berupa teks.',
            'address.max' => 'Alamat maksimal 500 karakter.',

            'avatar.image' => 'Foto profil harus berupa gambar.',
            'avatar.mimes' => 'Format foto harus JPG, PNG, atau WebP.',
            'avatar.max' => 'Ukuran foto maksimal 2MB.',
            'avatar.dimensions' => 'Dimensi foto harus antara 100x100 hingga 2000x2000 pixel.',
        ];
    }

    /**
     * Nama atribut yang ditampilkan ke user
     */
    public function attributes(): array
    {
        return [
            'name' => 'nama',
            'email' => 'alamat email',
            'phone' => 'nomor telepon',
            'address' => 'alamat',
            'avatar' => 'foto profil',
        ];
    }
}
