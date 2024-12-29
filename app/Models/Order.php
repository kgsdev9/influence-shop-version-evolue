<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'user_id',
        'codeinfluenceur',
        'entreprise_id',
        'cost_delivery',
        'compagne_id',
        'qtecmde',
        'influenceur_id',
        'product_id',
        'montantht',
        'montanttva',
        'montanttc',
        'status',
        'payment_method',
        'shipping_address',
        'deliveryorder_id',
        'delivery_time',
    ];
}
