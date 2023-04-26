<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'photo',
    ];

    public function structures()
    {
        return $this->hasMany(Structure::class);
    }

    public function structure()
    {
        return $this->belongsTo(Structure::class);
    }
}
