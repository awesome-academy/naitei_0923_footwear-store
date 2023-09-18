<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CartDetail extends Model
{
    use HasFactory;

    public $guarded = [];
    /**
     * One cart_detail belongs to one user
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    /**
     * One cart_detail has one product_in_stock
     */
    public function productInStocks(): HasMany
    {
        return $this->hasMany(ProductInStock::class, 'id', 'product_in_stocks_id');
    }
}
