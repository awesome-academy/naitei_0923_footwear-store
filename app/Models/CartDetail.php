<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartDetail extends Model
{
    use HasFactory;

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
    public function productInStock(): BelongsTo
    {
        return $this->belongsTo(ProductInStock::class)->withDefault();
    }
}
