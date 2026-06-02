<?php

namespace App\Models;

use Cog\Contracts\Ban\Bannable as BannableInterface;
use Cog\Laravel\Ban\Traits\Bannable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail, BannableInterface
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, Bannable;

    /**
     * Mass assignable fields
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'email_verified_at',
        'remember_token'
    ];

    /**
     * Hidden fields
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casts
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function owns()
    {
        return $this->hasOne(Pharmacy::class, 'user_id');
    }

    public function client()
    {
        return $this->hasOne(Client::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    public function pharmacy()
    {
        return $this->hasOne(Pharmacy::class);
    }

    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }

    /*
    |--------------------------------------------------------------------------
    | ROLE HELPERS (SPATIE CORRECT WAY)
    |--------------------------------------------------------------------------
    */

    public function isAdmin(): bool
    {
        return $this->hasRole('admin');
    }

    public function isPharmacy(): bool
    {
        return $this->hasRole('pharmacy');
    }

    public function isClient(): bool
    {
        return $this->hasRole('client');
    }

    /*
    |--------------------------------------------------------------------------
    | EMAIL VERIFICATION
    |--------------------------------------------------------------------------
    */

    public function getEmailForVerification()
    {
        return $this->email;
    }
}