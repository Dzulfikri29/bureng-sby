<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    public function images()
    {
        return $this->hasMany(SectionImage::class);
    }

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
