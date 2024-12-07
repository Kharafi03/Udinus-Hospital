<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class PasienSeeder extends Seeder
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
        
        // Membuat 15 data pasien
        for ($i = 1; $i <= 15; $i++) {
            DB::table('pasien')->insert([
                'nama' => $faker->name, // Nama pasien
                'alamat' => $faker->address, // Alamat pasien
                'no_ktp' => $faker->unique()->numerify('################'), // No KTP 16 digit
                'no_hp' => '08' . $faker->unique()->numerify('##########'), // No HP yang dimulai dengan '08' dan panjang 12 digit
                'no_rm' => $faker->unique()->numerify('##########'), // No RM yang unik, 10 digit
                'password' => Hash::make('12345678'), // Password default yang sudah di-hash
            ]);
        }
    }
}
