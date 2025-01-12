<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Souscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'entreprise_id',
        'abonnement_id',
        'date_fin',
        'date_debut'
    ];


    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class, 'entreprise_id');
    }

    public function abonnement()
    {
        return $this->belongsTo(Abonnement::class);
    }
}
