<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function oproducts()
    {
        return $this->hasMany(Oproduct::class);
    }
}
