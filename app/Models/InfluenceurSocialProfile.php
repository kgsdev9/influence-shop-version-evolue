<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfluenceurSocialProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'namesocialprofile',
        'link',
        'followers',
        'influenceur_id',
    ];
}
