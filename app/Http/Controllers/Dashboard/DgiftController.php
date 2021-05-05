<?php

namespace App\Http\Controllers\Dashboard;

use App\Gift;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;
use App\Http\Controllers\Controller;

class DgiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gifts = Gift::with('product')->get();
        $categories = Category::select('id', 'name')->get();
        return view('dashboard.gifts', compact('gifts', 'categories'));

    }

    public function get_product(Request $request)
    {
        $products = Product::where('category_id', $request->id)->select('id', 'name')->get();

        return response()->json([
            'status' => 'success',
            'products' => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, FlasherInterface $flasher)
    {
        $gift = new Gift();
        $gift->product_id = $request->product_id;
        $gift->points = $request->points;
        $gift->save();

        $flasher->addSuccess('Gift Created Successfully.');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($gift_id, FlasherInterface $flasher)
    {
        Gift::find($gift_id)->delete();

        $flasher->addSuccess('Gift Deleted Successfully.');
        return back();
    }
}
