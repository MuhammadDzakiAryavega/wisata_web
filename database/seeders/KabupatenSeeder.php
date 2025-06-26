<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KabupatenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kabupatens')->insert([
            [
                'kabupaten_name' => 'Kepulauan Mentawai',
                'description' => 'Kabupaten Kepulauan Mentawai di Sumatera Barat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kabupaten_name' => 'Pesisir Selatan',
                'description' => 'Kabupaten Pesisir Selatan di Sumatera Barat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kabupaten_name' => 'Solok',
                'description' => 'Kabupaten Solok di Sumatera Barat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kabupaten_name' => 'Sijunjung',
                'description' => 'Kabupaten Sijunjung di Sumatera Barat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kabupaten_name' => 'Tanah Datar',
                'description' => 'Kabupaten Tanah Datar di Sumatera Barat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kabupaten_name' => 'Padang Pariaman',
                'description' => 'Kabupaten Padang Pariaman di Sumatera Barat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kabupaten_name' => 'Agam',
                'description' => 'Kabupaten Agam di Sumatera Barat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kabupaten_name' => 'Lima Puluh Kota',
                'description' => 'Kabupaten Lima Puluh Kota di Sumatera Barat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kabupaten_name' => 'Pasaman',
                'description' => 'Kabupaten Pasaman di Sumatera Barat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kabupaten_name' => 'Solok Selatan',
                'description' => 'Kabupaten Solok Selatan di Sumatera Barat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kabupaten_name' => 'Dharmasraya',
                'description' => 'Kabupaten Dharmasraya di Sumatera Barat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kabupaten_name' => 'Pasaman Barat',
                'description' => 'Kabupaten Pasaman Barat di Sumatera Barat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Tambahan 7 kota
            [
                'kabupaten_name' => 'Kota Padang',
                'description' => 'Kota Padang di Sumatera Barat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kabupaten_name' => 'Kota Solok',
                'description' => 'Kota Solok di Sumatera Barat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kabupaten_name' => 'Kota Sawahlunto',
                'description' => 'Kota Sawahlunto di Sumatera Barat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kabupaten_name' => 'Kota Padang Panjang',
                'description' => 'Kota Padang Panjang di Sumatera Barat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kabupaten_name' => 'Kota Bukittinggi',
                'description' => 'Kota Bukittinggi di Sumatera Barat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kabupaten_name' => 'Kota Payakumbuh',
                'description' => 'Kota Payakumbuh di Sumatera Barat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kabupaten_name' => 'Kota Pariaman',
                'description' => 'Kota Pariaman di Sumatera Barat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
