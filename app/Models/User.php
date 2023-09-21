<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'is_active' => true,
    ];

    /**
     * The attributes that are in blacklisted
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get full name from first name and last name
     */
    protected function getFullNameAttribute()
    {
        return $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];
    }

    /**
     * Change username into a slug string
     */
    protected function setUsernameAttribute($value)
    {
        $this->attributes['username'] = Str::slug($value);
    }

    /**
     * One user can have many roles
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'user_role', 'user_id', 'role_id')->withTimestamps();
    }

    /**
     * One user can make many reviews
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    /**
     * One user can have many vouchers
     */
    public function vouchers(): BelongsToMany
    {
        return $this->belongsToMany(Voucher::class)->withTimestamps();
    }

    /**
     * One user can like many products
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'favourite_list', 'user_id', 'product_id')->withTimestamps();
    }

    /**
     * One user can have many bills
     */
    public function bills(): HasMany
    {
        return $this->hasMany(Bill::class);
    }

    /**
     * One user can have many cart_details
     */
    public function cartDetails(): HasMany
    {
        return $this->hasMany(CartDetail::class);
    }

    public function hasRole($role)
    {
        $roleId = Role::where('role', '=', $role)->first();

        if (!$this->roles->contains($roleId)) {
            return false;
        }

        return true;
    }
}
