<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compagne extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'type',
        'start_date',
        'end_date',
        'total_budget',
        'status',
        'entreprise_id',
        'product_id',
    ];


    public function influencers()
    {
        return $this->belongsToMany(Influenceur::class, 'campaign_influencer');
    }
}
