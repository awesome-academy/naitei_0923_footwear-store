<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Voucher extends Model
{
    use HasFactory;

    /**
     * The attributes that are fillable
     *
     * @var array<int, string>
     */
    protected $fillable = [];

    /**
     * One kind of voucher can be received by many users
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
