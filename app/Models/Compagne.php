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
        'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
