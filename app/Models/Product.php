<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'subcategory_id',
        'code',
        'name',
        'slug',
        'description',
        'weight',
        'format',
        'yield',
        'traffic',
        'type_of_sale',
        'quantity',
        'price',
        'image',
        'palette_color',
        'url_sheet',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });

        static::updating(function ($product) {
            if ($product->isDirty('name') && ! $product->isDirty('slug')) {
                $product->slug = Str::slug($product->name);
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function ratings()
    {
        return $this->hasMany(ProductRating::class);
    }
}
