<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
    use HasFactory;
    protected $fillable = [
        'designation',
        'price',
        'shot_description_fr',
        'shot_description_en',
        'image'
    ];
}
