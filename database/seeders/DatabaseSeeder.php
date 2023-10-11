<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Sampah;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'administrator@gmail.com',
        ]);

        Sampah::create([
            'nama' => 'Plastik',
            'harga_kg' => 3000,
            'deskripsi' => "ini adalah sampah plastik"
        ]);
        Sampah::create([
            'nama' => 'besi',
            'harga_kg' => 15000,
            'deskripsi' => "ini adalah sampah besi"
        ]);
        Sampah::create([
            'nama' => 'kertas',
            'harga_kg' => 2000,
            'deskripsi' => "ini adalah sampah kertas"
        ]);
    }
}
