<?php

namespace App;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    public  function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
    public  function users()
    {
        return $this->belongsTo(User::class);
    }
    public $timestamps = false;
}
