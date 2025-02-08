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
        'poids',
        'couleur_id',
        'taille_id',
        'description',
        'category_id',
        'qtedisponible',
        'status',
    ];

    public function taille()
    {
        return $this->belongsTo(Taille::class, 'taille_id');
    }

    public function color()
    {
        return $this->belongsTo(Couleur::class, 'couleur_id');
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
