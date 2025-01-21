<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentaireProduct extends Model
{
    use HasFactory;

    protected $fillable  = ['commentaire', 'product_id', 'note', 'user_id'];
}
