<?php

namespace App\Http\Controllers\Dashboard;

use App\Extra;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;
use App\Http\Controllers\Controller;

class DextraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $extras = Extra::all();
        return view('dashboard.extras', compact('extras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, FlasherInterface $flasher)
    {
        $extra = new Extra();
        $extra->name = $request->name;
        $extra->price = $request->price;
        $extra->type = $request->type;
        $extra->save();

        $flasher->addSuccess('Created Successfully.');
        return back();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $extra_id, FlasherInterface $flasher)
    {
        $extra = Extra::find($extra_id);
        $extra->name = $request->name;
        $extra->price = $request->price;
        $extra->type = $request->type;
        $extra->update();

        $flasher->addSuccess('Updated Successfully.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($extra_id, FlasherInterface $flasher)
    {
        $extra = Extra::find($extra_id);
        $extra->categories()->detach();
        $extra->delete();

        $flasher->addInfo('Successfuly Deleted!');
        return back();
        
    }
}
