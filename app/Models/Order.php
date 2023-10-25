<?php

namespace App\Models;

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
        'price_total'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
