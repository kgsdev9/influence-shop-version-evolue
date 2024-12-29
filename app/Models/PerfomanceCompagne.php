<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerfomanceCompagne extends Model
{
    use HasFactory;

    protected $fillable = [
        'campaggne_id',
        'impressions',
        'clicks',
        'conversions',
        'click_through_rate',
        'cost_per_click',
        'cost_per_acquisition',
        'revenue_generated',
        'measured_at',
    ];

    //ID de la campagne : campaign_id (clé étrangère vers la table campaigns)
    // Nombre d'impressions : impressions
    // Nombre de clics : clicks
    // Nombre de conversions : conversions
    // Taux de clics (CTR) : click_through_rate
    // Coût par clic (CPC) : cost_per_click
    // Coût par conversion (CPA) : cost_per_acquisition
    // Revenu généré : revenue_generated

}
