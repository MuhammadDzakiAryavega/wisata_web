<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Kabupaten;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wisata>
 */
class WisataFactory extends Factory
{
    public function definition(): array
    {
        $title = fake()->sentence(rand(3, 6));
        $slug = Str::slug($title);

        // Ambil ID kategori yang valid, jika tidak ada buat satu
        $categoryId = Category::inRandomOrder()->value('id') ?? Category::factory()->create()->id;
        $kabupatenId = Kabupaten::inRandomOrder()->value('id') ?? Kabupaten::factory()->create()->id;

        return [
            'title' => $title,
            'slug' => $slug,
            'description' => fake()->paragraphs(rand(2, 4), true),
            'kabupaten_id' => $kabupatenId,
            'kecamatan' => fake()->city(),
            'category_id' => $categoryId,
            'year' => fake()->year(),
            'cover_image' => 'https://picsum.photos/seed/' . Str::random(10) . '/480/720',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
    
}
