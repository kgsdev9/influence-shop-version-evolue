<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Souscription extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'reference',
        'user_id',
        'price',
        'abonnement_id',
        'date_fin',
        'date_debut'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function abonnement()
    {
        return $this->belongsTo(Abonnement::class);
    }
}
