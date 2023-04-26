<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $appends = ['whatsapp_link'];

    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function getWhatsappLinkAttribute()
    {
        $phone = "wa.me/" . $this->phone . "?text=";
        $text = "Saya tertarik dengan produk *$this->name* \n";
        $text .= route('product.show', ['slug' => $this->slug]);
        return $phone . urlencode($text);
    }
}
