<?php
// database/seeders/CategorySeeder.php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Elektronik',
                'slug' => 'elektronik',
                'description' => 'Perangkat elektronik seperti smartphone, laptop, dan gadget lainnya',
                'image' => 'https://imgs.search.brave.com/I4lBBBq2YdNwZRtZla8-bJNSiINGKtuRBqdAeT8TMAA/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9jZG4u/dmVjdG9yc3RvY2su/Y29tL2kvcHJldmll/dy0xeC84NS8zMS9l/bGVjdHJvbmljcy1p/Y29uLXZlY3Rvci04/NDk4NTMxLmpwZw',
                'is_active' => true,
            ],
            [
                'name' => 'Fashion Pria',
                'slug' => 'fashion-pria',
                'description' => 'Pakaian, sepatu, dan aksesoris untuk pria',
                'image' => 'https://imgs.search.brave.com/UbDLRFjpYmTvjOJwLP-EU5KO9_oXH9GhpxNSNg1cNIs/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9jZG4t/aWNvbnMtcG5nLmZs/YXRpY29uLmNvbS8x/MjgvMjMzMS8yMzMx/NzE2LnBuZw',
                'is_active' => true,
            ],
            [
                'name' => 'Fashion Wanita',
                'slug' => 'fashion-wanita',
                'description' => 'Pakaian, sepatu, dan aksesoris untuk wanita',
                'image'=> 'https://imgs.search.brave.com/UbDLRFjpYmTvjOJwLP-EU5KO9_oXH9GhpxNSNg1cNIs/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9jZG4t/aWNvbnMtcG5nLmZs/YXRpY29uLmNvbS8x/MjgvMjMzMS8yMzMx/NzE2LnBuZw',
                'is_active' => true,
            ],
            [
                'name' => 'Makanan & Minuman',
                'slug' => 'makanan-minuman',
                'description' => 'Berbagai makanan ringan, minuman, dan bahan makanan',
                'image'=> 'https://imgs.search.brave.com/QOeVEMyGPJpxdNwwff4zllUpiYI8HD1MusywUm3R5WU/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9jZG4t/aWNvbnMtcG5nLmZy/ZWVwaWsuY29tLzI1/Ni85MTIzLzkxMjMz/NzgucG5nP3NlbXQ9/YWlzX3doaXRlX2xh/YmVs',
                'is_active' => true,
            ],
            [
                'name' => 'Kesehatan & Kecantikan',
                'slug' => 'kesehatan-kecantikan',
                'description' => 'Produk kesehatan, skincare, dan kosmetik',
                'image'=> 'https://imgs.search.brave.com/uTpFjhxkAy-TQF_AM_nDd48K5T4ChjNCs44bUaBKHts/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvNjQ3/NzgzNDQwL2lkL3Zl/a3Rvci9pa29uLXRp/bS1tZWRpcy5qcGc_/cz02MTJ4NjEyJnc9/MCZrPTIwJmM9NkZR/R1QzMWk1ajdEYjB2/THZMVnRKNGdrV0d5/ZWgyYlhNOFI4YzBq/TmRyTT0',
                'is_active' => true,
            ],
            [
                'name' => 'Rumah Tangga',
                'slug' => 'rumah-tangga',
                'description' => 'Peralatan rumah tangga dan dekorasi',
                'image'=> 'https://imgs.search.brave.com/NTbhcPxoDEFtM5LLDMuDJnc1hRFk1FqgE0pMUy43u6Y/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pY29u/LWljb25zLmNvbS9p/Y29uczIvMzcwMC9Q/TkcvOTYvd2FzaGlu/Z19tYWNoaW5lX2hv/bWVfYXBwbGlhbmNl/c19sYXVuZHJ5X2lj/b25fMjI5ODY1LnBu/Zw',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        $this->command->info('✅ Categories seeded successfully!');
    }
}