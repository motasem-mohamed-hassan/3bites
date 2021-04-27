<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // public function sizes()
    // {
    //     return $this->hasManyThrough(Size::class, Product::class);
    // }

    public function extras()
    {
        return $this->belongsToMany(Extra::class);
    }
}
