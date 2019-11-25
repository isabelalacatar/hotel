<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function room()
    {
        return $this->belongsTo(Hotel::class);

    }
    public function rezervation()
    {
        return $this->belongsToMany(Reservation::class);
    }
}
