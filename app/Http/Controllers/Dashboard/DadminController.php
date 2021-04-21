<?php

namespace App\Http\Controllers\Dashboard;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class DadminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();

        return view('dashboard.admins', compact('admins'));
    }

    public function change($admin_id)
    {
        $admin = Admin::find($admin_id);
        $admin->is_super = !$admin->is_super;
        $admin->save();
        return back();
    }


    public function store(Request $request)
    {
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();

        return back();
    }

}
