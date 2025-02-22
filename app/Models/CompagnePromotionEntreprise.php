<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompagnePromotionEntreprise extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'entreprise_id',
        'description',
        'status',
        'url_promotion',
    ];

    /**
     * Relation avec l'entreprise
     */
    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class, 'entreprise_id');
    }
}
