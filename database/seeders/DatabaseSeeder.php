<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Naufal',
            'email' => 'admin@example.com',
            'role' => 'Admin',
            'password' => bcrypt('1111')
        ]);

        User::create([
            'name' => 'Naufal',
            'email' => 'user@example.com',
            'role' => 2,
            'password' => bcrypt('11111')
        ]);

        Category::create([
            'name' => 'Fashion',
            'desc' => 'Kategori Fashion mencakup segala hal yang berhubungan dengan gaya berpakaian, tren mode, dan aksesoris. Dalam dunia fashion, kategori ini mencakup berbagai jenis pakaian, sepatu, tas, perhiasan, serta perkembangan tren yang terus berubah dari waktu ke waktu'
        ]);
    }

}
