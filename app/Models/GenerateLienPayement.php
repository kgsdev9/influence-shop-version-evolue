<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenerateLienPayement extends Model
{
    use HasFactory;

    protected $fillable = [
        'influenceur_id',
        'compagne_id',
        'entreprise_id',
        'paymentlink',
        'date_expiration',
        'minute_expiration',
        'product_id',
    ];
}
