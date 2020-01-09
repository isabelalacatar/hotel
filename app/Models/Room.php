<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);

    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public const ROOM_TYPES = [
        1 => 'Single',
        2 => 'Double'
    ];

    public const ROOM_VIEWS = [
        1 => 'Gardem',
        2 => 'Sea',
        3 => 'Mountain',
    ];
    public $timestamps = false;
}
