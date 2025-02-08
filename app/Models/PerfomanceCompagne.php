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

}
