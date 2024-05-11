<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Analyse ;
class Laboratory extends Model
{
    use HasFactory;

    public function analyses()
    {
        return $this->belongsToMany(Analyse::class);
    }
}
