<?php

namespace App\Http\Controllers\Dashboard;

use App\Gift;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DhomeController extends Controller
{
    public function index()
    {
        return view('dashboard.home');
    }
}
