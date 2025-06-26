<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommercialPartner extends Model
{
    use HasFactory;

    protected $fillable = [
        'state_id',
        'name',
        'description',
        'image',
        'active',
        'url',
        'phone',
        'email',
        'address',
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
