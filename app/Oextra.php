<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oextra extends Model
{
    public function oproduct()
    {
        return $this->belongsTo(Oproduct::class);
    }
}
