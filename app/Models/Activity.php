<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;


    protected $fillable = [
        'slug',
        'title',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'body',
        'image',
    ];

    public function images()
    {
        return $this->hasMany(ActivityImage::class);
    }
}
