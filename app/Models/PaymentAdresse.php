<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentAdresse extends Model
{
    use HasFactory;

    protected $fillable = [
        'telephone',
        'email',
        'adresse',
        'user_id',
        'city',
        'pays',
        'is_default',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }





}
