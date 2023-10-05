<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use LaravelViews\Facades\UI;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    /**
     * The attributes that are in blacklisted
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'total',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date' => 'datetime',
    ];

    /**
     * One bill belongs to one user
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    /**
     * One bill has many bill_products
     */
    public function billProducts(): HasMany
    {
        return $this->hasMany(BillProduct::class);
    }

    protected function getStatusTagAttribute()
    {
        $status = $this->status;
        
        if ($status == config('app.bill_status.pending')) {
            $status = UI::badge($status);
        } elseif ($status == config('app.bill_status.cancelled') ||
                $status == config('app.bill_status.cant_ship') ||
                $status == config('app.bill_status.declined')
        ) {
            $status = UI::badge($status, 'danger');
        } elseif ($status == config('app.bill_status.confirmed') ||
                $status == config('app.bill_status.manual') ||
                $status == config('app.bill_status.shipping') ||
                $status == config('app.bill_status.awating')
        ) {
            $status = UI::badge($status, 'warning');
        } elseif ($status == config('app.bill_status.shipped') ||
                $status == config('app.bill_status.completed')
        ) {
            $status = UI::badge($status, 'success');
        }

        return $status;
    }
}
