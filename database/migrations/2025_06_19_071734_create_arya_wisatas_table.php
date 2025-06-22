<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wisatas', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // ganti dari 'name' agar sesuai factory
            $table->string('slug')->unique();
            $table->string('kecamatan');
            $table->text('description');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->year('year');
            $table->string('cover_image', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wisatas'); // diperbaiki dari 'wisata'
    }
};
