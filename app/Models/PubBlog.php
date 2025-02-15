<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PubBlog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'organisateur',
        'lieu',
        'codeblog',
        'mini_description',
        'description',
        'date_event_debut',
        'date_event_fin',
        'price',
        'temps_lecture',
        'publish_at',
        'country_id',
        'city_id'
    ];



    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

}
