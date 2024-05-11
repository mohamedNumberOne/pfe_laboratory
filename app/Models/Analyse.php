<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analyse extends Model
{
    use HasFactory;

    public function laboratories()
    {
        return $this->belongsToMany(Laboratory::class);
    }
}
