<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BillProduct extends Model
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
     * One bill_product belongs to one bill
     */
    public function bill(): BelongsTo
    {
        return $this->belongsTo(Bill::class)->withDefault();
    }

    /**
     * One bill_product has one product in stock
     */
    public function productInStock(): BelongsTo
    {
        return $this->belongsTo(ProductInStock::class, 'product_in_stocks_id', 'id')->withDefault();
    }
}
