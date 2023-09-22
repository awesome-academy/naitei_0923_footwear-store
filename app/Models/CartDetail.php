<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;

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

    public function getCartItems($user_id)
    {
        $cartItems = DB::table('cart_details')
            ->join('product_in_stocks', 'product_in_stocks.id', '=', 'cart_details.product_in_stocks_id')
            ->join('products', 'products.id', '=', 'product_in_stocks.product_id')
            ->join('product_media', 'products.id', '=', 'product_media.product_id')
            ->select([
                'product_in_stocks.product_id',
                'products.name', 'cart_details.quantity',
                'product_in_stocks.price',
                'product_media.media_link',
                'cart_details.id',
            ])
            ->where('cart_details.user_id', '=', $user_id)
            ->where('product_media.type', '=', config('app.media.bigImg'))
            ->get();
        
        return $cartItems;
    }
}
