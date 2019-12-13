<?php

namespace App\Models;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);

    }
    //public $timestamps = false;
}
