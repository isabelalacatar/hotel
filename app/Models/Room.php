<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);

    }
    public function rezervation()
    {
        return $this->belongsToMany(Reservation::class);
    }

    public const ROOM_TYPES = [
        1 => 'Single',
        2 => 'Double'
    ];
}
