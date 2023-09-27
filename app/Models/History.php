<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'header',
        'body',
        'first_gallery_id',
        'second_gallery_id',
    ];

    public function first_gallery()
    {
        return $this->belongsTo(Gallery::class, 'first_gallery_id');
    }

    public function second_gallery()
    {
        return $this->belongsTo(Gallery::class, 'second_gallery_id');
    }
}
