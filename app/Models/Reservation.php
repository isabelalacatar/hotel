<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function reservation()
    {
        return $this->belongsTo(User::class);


    }
    public function room()
    {
        return $this->belongsToMany(Room::class);
    }
}
