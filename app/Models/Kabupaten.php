<?php

namespace App\Models;

use App\Models\Wisata;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    public function wisatas()
    {
        return $this->hasMany(Wisata::class);
    }
}
