<?php
namespace App\Models;

use App\Models\Upload;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
    public function uploads()
    {
        return $this->hasMany(Upload::class);
    }
}
