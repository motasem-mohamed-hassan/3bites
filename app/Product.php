<?php

namespace App;

use App\Size;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function products()
    {
        return $this->belongsToMany(Order::class)->withPivot(['quantity']);
    }

    public function sizes()
    {
        return $this->hasMany(Size::class);
    }

}
