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

      return response()->json([
          'status'    => true,
          'info'      => $info
      ]);

    }
}
