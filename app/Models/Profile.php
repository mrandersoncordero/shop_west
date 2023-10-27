<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'dni',
        'first_name',
        'last_name',
        'address',
        'phone_number',
        'birthday_date',
    ];
    
    protected $table = 'profiles';
}
