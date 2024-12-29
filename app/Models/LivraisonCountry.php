<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivraisonCountry extends Model
{
    use HasFactory;

    protected $fillable = [
        'countrystart',
        'countryarrivee',
        'price',
    ];
}
