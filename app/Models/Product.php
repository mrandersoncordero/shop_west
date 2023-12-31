<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'subcategory_id',
        'code',
        'name',
        'description',
        'weight',
        'format',
        'yield',
        'traffic',
        'price',
        'image',
    ];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}
