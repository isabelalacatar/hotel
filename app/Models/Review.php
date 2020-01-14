<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }



    public function getCreatedAtAttribute($value)
    {
//        return date('D m Y H:i:s', strtotime($value));
    }
}
