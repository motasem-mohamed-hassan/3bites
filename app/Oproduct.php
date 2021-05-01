<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oproduct extends Model
{
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function oextras()
    {
        return $this->hasMany(Oextra::class);
    }
}
