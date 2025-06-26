<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'designation_en',
        'designation_fr'
    ];

    public function items()
    {
        return $this->hasMany(MenuRestau::class);
    }
}
