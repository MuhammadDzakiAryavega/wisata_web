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
                'nama' => 'Kepulauan Mentawai',
                'deskripsi' => 'Kabupaten Kepulauan Mentawai di Sumatera Barat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Pesisir Selatan',
                'deskripsi' => 'Kabupaten Pesisir Selatan di Sumatera Barat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Solok',
                'deskripsi' => 'Kabupaten Solok di Sumatera Barat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Sijunjung',
                'deskripsi' => 'Kabupaten Sijunjung di Sumatera Barat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Tanah Datar',
                'deskripsi' => 'Kabupaten Tanah Datar di Sumatera Barat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Padang Pariaman',
                'deskripsi' => 'Kabupaten Padang Pariaman di Sumatera Barat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Agam',
                'deskripsi' => 'Kabupaten Agam di Sumatera Barat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Lima Puluh Kota',
                'deskripsi' => 'Kabupaten Lima Puluh Kota di Sumatera Barat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Pasaman',
                'deskripsi' => 'Kabupaten Pasaman di Sumatera Barat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Solok Selatan',
                'deskripsi' => 'Kabupaten Solok Selatan di Sumatera Barat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Dharmasraya',
                'deskripsi' => 'Kabupaten Dharmasraya di Sumatera Barat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Pasaman Barat',
                'deskripsi' => 'Kabupaten Pasaman Barat di Sumatera Barat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
