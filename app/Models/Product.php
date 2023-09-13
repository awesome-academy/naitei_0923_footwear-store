<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are in blacklisted
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'deleted_at',
    ];

    /**
     * One product has many types of products in stock
     */
    public function productInStocks(): HasMany
    {
        return $this->hasMany(ProductInStock::class);
    }

    /**
     * One product has many media
     */
    public function productMedias(): HasMany
    {
        return $this->hasMany(ProductMedia::class);
    }

    /**
     * One product has many reviews
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    /**
     * One product can be liked by many users
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favourite_list', 'product_id', 'user_id')->withTimestamps();
    }
}
