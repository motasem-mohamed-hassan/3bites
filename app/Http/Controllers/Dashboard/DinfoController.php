<?php

namespace App\Http\Controllers\Dashboard;

use App\Info;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
        $info->google_link = $request->google_link;
        $info->apple_link = $request->apple_link;

        if($request->hasFile('banner')){
            File::delete('public/banner/'.$info->banner);
            Storage::disk('local')->delete('public/banner/'.$info->banner);

                $imageurl = $request->file('banner');
                $imageurl->getClientOriginalName();
                $ext    = $imageurl->getClientOriginalExtension();
                $file   = date('YmdHis').rand(1,99999).'.'.$ext;
                $imageurl->storeAs('public/banner', $file);
            $info->banner = $file;
        }

        $info->save();

        $flasher->addSuccess('Info Updated Successfully.');
        return back();
    }
}
