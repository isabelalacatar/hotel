<?php
namespace App\Models;

use App\Models\Upload;
use App\Models\Review;
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
    public function reviews(){
        return  $this->hasMany(Review::class);
    }
}
