<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class DuserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('dashboard.users', compact('users'));
    }
}
