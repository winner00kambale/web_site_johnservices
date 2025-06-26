<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_en',
        'title_fr',
        'description_en',
        'description_fr',
        'horaire'
    ];
}
