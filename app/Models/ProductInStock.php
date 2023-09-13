<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductInStock extends Model
{
    use HasFactory;

    /**
     * The attributes that are in blacklisted
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'price',
    ];

    /**
     * One product in stock belongs to one product, but one product has many products in stock
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class)->withDefault();
    }
    
    /**
     * One product in stock belongs to many bill_product
     */
    public function billProducts(): HasMany
    {
        return $this->hasMany(BillProduct::class);
    }

    /**
     * One product in stock can be in many cart_details
     */
    public function cartDetails(): HasMany
    {
        return $this->hasMany(CartDetails::class);
    }
}
