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
        'paymentaresse_id',
        'codeparainage',
        'qtecmde',
        'montantht',
        'montanttva',
        'montanttc',
        'poidscmde',
        'montantpoidscmde',
        'montantlivraison',
        'status',
        'payment_method',
    ];

    
    public function items()
    {
        return  $this->hasMany(OrderDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paymentAddress()
    {
        return $this->belongsTo(PaymentAdresse::class, 'paymentaresse_id');
    }
}
