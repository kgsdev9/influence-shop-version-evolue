<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Influenceur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'phone',
        'codeinfluenceur',
        'codeprive', 
        'user_id',
        'whattssap',
        'category_id',
        'adresse',
        'country_id',
        'city_id',
        'languages',
        'average_rate',
        'bio',
        'profile_picture',
        'availability',
    ];


    public static function generateUniqueCode()
    {
        do {
            $code = 'INF' . strtoupper(Str::random(6)); // Exemple : 'INF123ABC'
        } while (self::where('codeinfluenceur', $code)->exists()); // Vérifie si le code existe déjà

        return $code;
    }
}
