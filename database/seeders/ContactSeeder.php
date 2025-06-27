<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        Contact::create([
            'name' => 'Arya',
            'gmail' => 'arya@gmail.com',
            'subject' => 'Pertanyaan Wisata',
            'message' => 'Apakah lokasi ini bisa diakses saat musim hujan?',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
