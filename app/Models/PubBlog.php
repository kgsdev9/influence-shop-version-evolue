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
        'temps_lecture',
        'publish_at'
    ];
}
