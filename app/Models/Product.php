<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price_achat',
        'codeproduct',
        'price_vente',
        'user_id',
        'shortdescription',
        'description',
        'category_id',
        'qtedisponible',
        'status',
    ];

    public function sizes()
    {
        return $this->hasMany(Taille::class);
    }

    public function colors()
    {
        return $this->hasMany(Couleur::class);
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
