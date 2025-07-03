<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Wisata;
use App\Models\Category;
use App\Models\Kabupaten;
use App\Models\Contact;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat kategori manual
        //$this->call(CategorySeeder::class);
        // Buat data dummy lainnya
        //Wisata::factory()->count(30)->create();
        //$this->call(ContactSeeder::class);
        //$this->call(KabupatenSeeder::class);
         User::factory(7)->create();
    }
}
