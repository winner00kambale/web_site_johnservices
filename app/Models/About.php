<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $fillable = [
        'Hotel_name',
        'title_en',
        'title_fr',
        'adress_fr',
        'facebook',
        'instagram',
        'twitter',
        'youtube',
        'linkedin',
        'email',
        'phone',
        'short_description_en',
        'short_description_fr',
        'image1',
        'image2',
    ];
}
