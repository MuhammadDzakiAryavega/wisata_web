<?php

namespace App\Models;

use App\Models\Wisata;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function wisata(): HasMany
    {
        return $this->hasMany(Wisata::class);
    }
}
