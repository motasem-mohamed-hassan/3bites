<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return $categories;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;

        $imageurl = $request->file('image');
        $imageurl->getClientOriginalName();
        $ext    = $imageurl->getClientOriginalExtension();
        $file   = date('YmdHis').rand(1,99999).'.'.$ext;
        $imageurl->storeAs('public/categories', $file);
        $category->image = $file;


        $category->save();
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
        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;

        if($request->hasFile('image')){
            File::delete('public/products/'.$category->image);
            Storage::disk('local')->delete('public/categories/'.$category->image);

            $imageurl = $request->file('image');
            $imageurl->getClientOriginalName();
            $ext    = $imageurl->getClientOriginalExtension();
            $file   = date('YmdHis').rand(1,99999).'.'.$ext;
            $imageurl->storeAs('public/categories', $file);
            $category->image = $file;
        }


        $category->save();
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        File::delete('public/products/'.$category->image);
        Storage::disk('local')->delete('public/categories/'.$category->image);

        $category->delete();

        return back();
    }
}
