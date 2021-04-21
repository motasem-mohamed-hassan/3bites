<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('dashboard.categories', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,  FlasherInterface $flasher)
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

        $flasher->addFlash('Category Created Successfully.');
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FlasherInterface $flasher)
    {
        $category = Category::find($request->id);
        $category->name_en  =   $request->name_en;
        $category->name_ar  =   $request->name_ar;

        if($request->hasFile('image')){
            File::delete('public/categories/'.$category->image);
            Storage::disk('local')->delete('public/categories/'.$category->image);

                $imageurl = $request->file('image');
                $imageurl->getClientOriginalName();
                $ext    = $imageurl->getClientOriginalExtension();
                $file   = date('YmdHis').rand(1,99999).'.'.$ext;
                $imageurl->storeAs('public/categories', $file);
            $category->image = $file;
        }

        $category->save();
        $flasher->addFlash('Category Updated Successfully.');
        return response()->json([
            'status'    => 'success',
            'msg'       => 'تم تعديل القسم بنجاح',
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, FlasherInterface $flasher)
    {
        $category = Category::find($id);
        File::delete('public/categories/'.$category->image);
        Storage::disk('local')->delete('public/categories/'.$category->image);

        $category->delete();

        $flasher->addInfo('Category Deleted!');

        return back();
    }
}
