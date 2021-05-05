<?php

namespace App\Http\Controllers\Api;

use App\Gift;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GiftController extends Controller
{
    public function get_gifts()
    {
        $gifts = Gift::all();
        foreach ($gifts as $gift) {
            $gift->product->image = asset('storage/products/'.$gift->product->image);
            $gift->product->sizes;
        }
        return $gifts;
    }
}
