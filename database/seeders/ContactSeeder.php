<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        $contacts = [
            [
                'name' => 'Arya',
                'gmail' => 'arya@gmail.com',
                'subject' => 'Pertanyaan Wisata',
                'message' => 'Apakah lokasi ini bisa diakses saat musim hujan?',
            ],
            [
                'name' => 'Dewi',
                'gmail' => 'dewi@yahoo.com',
                'subject' => 'Fasilitas Umum',
                'message' => 'Apakah tersedia toilet umum di area wisata ini?',
            ],
            [
                'name' => 'Budi',
                'gmail' => 'budi@outlook.com',
                'subject' => 'Parkir Kendaraan',
                'message' => 'Apakah ada area parkir untuk bus wisata?',
            ],
            [
                'name' => 'Sinta',
                'gmail' => 'sinta@mail.com',
                'subject' => 'Jam Operasional',
                'message' => 'Jam buka tempat wisata ini dari pukul berapa?',
            ],
            [
                'name' => 'Rudi',
                'gmail' => 'rudi@gmail.com',
                'subject' => 'Akses Jalan',
                'message' => 'Apakah jalannya bisa dilalui sepeda motor?',
            ],
            [
                'name' => 'Lina',
                'gmail' => 'lina@live.com',
                'subject' => 'Harga Tiket',
                'message' => 'Berapa harga tiket masuk untuk orang dewasa?',
            ],
            [
                'name' => 'Tono',
                'gmail' => 'tono@gmail.com',
                'subject' => 'Panduan Wisata',
                'message' => 'Apakah tersedia tour guide untuk wisatawan?',
            ],
            [
                'name' => 'Nina',
                'gmail' => 'nina@ymail.com',
                'subject' => 'Penginapan',
                'message' => 'Apakah ada penginapan dekat lokasi ini?',
            ],
            [
                'name' => 'Yudi',
                'gmail' => 'yudi@domain.com',
                'subject' => 'Makanan',
                'message' => 'Apakah ada tempat makan di sekitar lokasi?',
            ],
            [
                'name' => 'Maya',
                'gmail' => 'maya@gmail.com',
                'subject' => 'Pembayaran',
                'message' => 'Apakah pembayaran bisa menggunakan e-wallet?',
            ],
        ];

        foreach ($contacts as $contact) {
            Contact::create(array_merge($contact, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
