<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Menggunakan Faker untuk generate data acak
        // Mengambil locale dari environment
        $fakerLocale = env('APP_FAKER_LOCALE', 'en_US'); // Jika APP_FAKER_LOCALE tidak ada, default ke 'id_ID'

        $faker = Faker::create($fakerLocale); // Menggunakan locale yang ditentukan di .env

        // Data 15 dokter dengan `id_poli` yang berbeda dan `no_hp` unik
        for ($i = 1; $i <= 15; $i++) {
            DB::table('dokter')->insert([
                'nama' => $faker->name, // Nama dokter acak (dengan nama Indonesia)
                'alamat' => $faker->address, // Alamat acak
                'no_hp' => '08' . $faker->unique()->numerify('##########'), // No HP yang dimulai dengan '08' dan panjang 12 digit
                'password' => Hash::make('12345678'), // Password yang sudah di-hash
                'id_poli' => $i, // Menggunakan `id_poli` dari 1 hingga 15
            ]);
        }
    }
}
