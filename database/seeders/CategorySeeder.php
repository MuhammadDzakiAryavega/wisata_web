<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    DB::table('categories')->insert([
        [
         'category_name' => 'masjid',
         'description' => 'masjid-masjid yang sangat indah',
         'created_at' => now(),
         'updated_at' => now(),
        ],
        [
         'category_name' => 'air terjun',
         'description' => 'wisata alam yang sangat memanjakan mata',
         'created_at' => now(),
         'updated_at' => now(),
        ],
        [
         'category_name' => 'pantai',
         'description' => 'pemandangan laut yang indah dengan sunset di senja hari',
         'created_at' => now(),
         'updated_at' => now(),
        ],
        [
         'category_name' => 'danau',
         'description' => 'ciptaan tuhan yang tak lekang dimakan zaman',
         'created_at' => now(),
         'updated_at' => now(),
        ],
        [
         'category_name' => 'museum',
         'description' => 'tempat benda-benda peninggalan sejarah',
         'created_at' => now(),
         'updated_at' => now(),
           ],
           [
         'category_name' => 'jembatan',
         'description' => 'bangunan penghubung antar 2 daerah',
         'created_at' => now(),
         'updated_at' => now(),
           ],
       ]
      );
    }
}
