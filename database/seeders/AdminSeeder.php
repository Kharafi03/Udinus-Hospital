<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat data admin
        Admin::create([
            'nama' => 'Kharafi',
            'alamat' => 'Jl. PG Banjaratma',
            'no_hp' => '082136676464',
            'password' => Hash::make('12345678'),
        ]);
    }
}
