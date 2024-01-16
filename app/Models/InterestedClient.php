<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterestedClient extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'email', 'accept_advertising'];
}
