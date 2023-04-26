<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    use HasFactory;

    protected $fillable = [
        'website_name',
        'phone',
        'email',
        'meta_descripton',
        'meta_keywords',
        'meta_image',
        'logo',
        'logo_white',
        'logo_short',
        'logo_short_white',
        'browser_logo',
    ];
}
