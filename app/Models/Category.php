<?php

namespace App\Models;

use App\Models\Wisata;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function wisatas()
    {
        return $this->hasMany(Wisata::class);
    }
}
