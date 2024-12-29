<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'address',
        'email',
        'phone',
        'website',
        'logo',
        'country_id',
        'city_id',
        'type_entreprise',
        'capital'
    ];


}
