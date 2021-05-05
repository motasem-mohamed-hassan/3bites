<?php

namespace App\Http\Controllers\Dashboard;

use App\Size;
use stdClass;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DproductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('dashboard.products', compact('categories'));
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


        $product = new Product();
        $product->category_id   = $request->category_id;
        $product->name          = $request->name;
        $product->description   = $request->description;
        $product->price         = $request->price;

        if($request->points == null){
            $product->points = 0;
        }else{
            $product->points     = $request->points;
        }


            $imageurl = $request->file('image');
            $imageurl->getClientOriginalName();
            $ext    = $imageurl->getClientOriginalExtension();
            $file   = date('YmdHis').rand(1,99999).'.'.$ext;
            $imageurl->storeAs('public/products', $file);
        $product->image = $file;
        $product->save();

        foreach(array_combine($request->size_names, $request->size_prices) as $name => $price){
            $size = new Size();
            $size->product_id = $product->id;
            $size->name = $name;
            $size->price = $price;
            $size->save();
        }

        $flasher->addSuccess('Product Created Successfully.');
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id, FlasherInterface $flasher)
    {
        $product = Product::find($product_id);
        $product->name          = $request->name;
        $product->description   = $request->description;
        $product->price         = $request->price;
        $product->points        = $request->points;

        if($request->hasFile('image')){
            File::delete('public/products/'.$product->image);
            Storage::disk('local')->delete('public/categories/'.$product->image);

                $imageurl = $request->file('image');
                $imageurl->getClientOriginalName();
                $ext    = $imageurl->getClientOriginalExtension();
                $file   = date('YmdHis').rand(1,99999).'.'.$ext;
                $imageurl->storeAs('public/products', $file);
            $product->image = $file;
        }
        $product->save();


        $flasher->addSuccess('Product Updated Successfully.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id ,FlasherInterface $flasher)
    {
        $product = Product::find($id);
        File::delete('public/products/'.$product->image);
        Storage::disk('local')->delete('public/categories/'.$product->image);

        $product->delete();

        $flasher->addInfo('Product Deleted!');
        return back();
    }
}
