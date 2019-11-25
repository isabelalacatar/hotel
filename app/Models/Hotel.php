<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    public function hotel()
    {
        return $this->hasMany(Room::class);
    }
}
