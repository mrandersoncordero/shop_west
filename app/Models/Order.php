<?php

namespace App\Models;

use App\Models\PaymentType;
use App\Models\OrderStatus;
use App\Models\ProductsOfOrder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'is_active',
        'payment_type_id',
        'status_id',
        'price_total',
        'retreat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment_type()
    {
        return $this->belongsTo(PaymentType::class);
    }

    public function status()
    {
        return $this->belongsTo(OrderStatus::class);
    }

    public function order_products()
    {
        return $this->hasMany(ProductsOfOrder::class);
    }
}
