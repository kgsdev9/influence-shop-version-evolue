<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PubBlog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'mini_description',
        'description',
        'image',
        'codeblog',
        'temps_lecture',
        'price',
        'date_event_debut',
        'date_event_fin',
        'publish_at'
    ];
}
