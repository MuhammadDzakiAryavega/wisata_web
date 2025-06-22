<?php

namespace Database\Seeders;

use App\Models\Wisata;
use Illuminate\Database\Seeder;

class WisataSeeder extends Seeder
{
    public function run(): void
    {
        Wisata::factory(10)->create();
    }
}
