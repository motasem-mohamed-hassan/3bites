<?php

namespace App\Http\Controllers\Dashboard;

use App\Info;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;
use App\Http\Controllers\Controller;

class DinfoController extends Controller
{
    public function index()
    {
        $info = Info::find(1);
        return view('dashboard.info', compact('info'));
    }

    public function update(Request $request, FlasherInterface $flasher)
    {
        $info = Info::find(1);
        $info->phone = $request->phone;
        $info->email = $request->email;
        $info->facebook_link = $request->facebook_link;
        $info->instagram_link = $request->instagram_link;
        $info->web_link     = $request->web_link;
        $info->save();

        $flasher->addSuccess('Info Updated Successfully.');
        return back();
    }
}
