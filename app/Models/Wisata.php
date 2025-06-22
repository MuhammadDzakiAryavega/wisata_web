<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wisata extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'kecamatan',
        'description',
        'category_id',
        'year',
        'cover_image',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
