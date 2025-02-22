<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'email',
        'telephone',
        'adresse',
        'site_web',
        'logo',
        'description',
        'statut',
        'category_entreprise_id',
    ];

    /**
     * Relation avec la catégorie d'entreprise
     */
    public function categorie()
    {
        return $this->belongsTo(CategoryEntreprise::class, 'category_entreprise_id');
    }

    /**
     * Relation avec les campagnes de promotion
     */
    public function campagnes()
    {
        return $this->hasMany(CompagnePromotionEntreprise::class);
    }
}
