<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'user_id',
        'codeinfluenceur',
        'entreprise_id',
        'statusdelivery',
        'cost_delivery',
        'compagne_id',
        'qtecmde',
        'influenceur_id',
        'product_id',
        'montantht',
        'montanttva',
        'statusdelivery',
        'montanttc',
        'paymentaresse_id',
        'status',
        'payment_method',
        'shipping_address',
        'pricedeliverybycountry_id',
        'delivery_time',
    ];

    public function user()
    {
        return $this->BelongsTo(User::class);
    }

    public function product()
    {
        return $this->BelongsTo(Product::class);
    }

    public function adresse()
    {
        return $this->BelongsTo(PaymentAdresse::class, 'paymentaresse_id');
    }

    public function deliverycontry()
    {
        return $this->BelongsTo(PriceDeliveryByCountry::class, 'pricedeliverybycountry_id');
    }
}
