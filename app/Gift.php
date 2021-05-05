<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
