<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Info;

class InfoController extends Controller
{
    public function index()
    {
        $info = Info::find(1);
        $info->banner = asset('storage/banner/'. $info->banner);
        return response()->json([
            'status'    => true,
            'info'      => $info
        ]);

    }
}
