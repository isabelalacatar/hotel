<?php

namespace App\Models;

use App\Models\Review;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public const USER_TYPES = [
        1 => 'guest',
        2 => 'admin user',
        3=>'isabela'
    ];
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function reviews()
    {
        return  $this->hasMany(Review::class);
    }
}
