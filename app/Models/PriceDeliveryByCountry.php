<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceDeliveryByCountry extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_start',
        'country_destination',
        'prix',
        'type_delivery',
        'delaidelivery'
    ];
}
