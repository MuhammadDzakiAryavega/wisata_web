<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Wisata;
use App\Models\Category;
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
         Wisata::factory()->count(20)->create();
        // User::factory(5)->create();
    }
}
