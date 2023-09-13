<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductMedia extends Model
{
    use HasFactory;

    /**
     * The attributes that are in blacklisted
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * One media belongs to one product, but one product has many media
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class)->withDefault();
    }
}
