<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    // Définir les champs fillables
    protected $fillable = [
        'product',
        'order_id',
        'seller_id',
        'taile',
        'couleur',
        'prixunitaire',
        'qunatite',
        'poidsarticle',
        'montantpoidsarticle',
        'montantht',
        'montanttva',
        'montanttc',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
}
