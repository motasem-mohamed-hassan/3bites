<?php

namespace App\Http\Controllers\Api;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('category_id', '!=', 1)->inRandomOrder()->limit(10)->get();
        foreach($products as $product){
            $product->image = asset('storage/products/'. $product->image);
        }
        if($products->isEmpty()){
            return response()->json([
                'status' => true,
                'msg'   => 'no data',
                'products' => $products
            ]);
        }else{
            return response()->json([
                'status' => true,
                'products' => $products,
            ]);
        }

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $product = new Product();
    //     $product->category_id   = $request->category_id;
    //     $product->name          = $request->name;
    //     $product->description   = $request->description;
    //     $product->price         = $request->price;
    //     $product->save();
    //
    //     return response()->json([
    //         'status'    => true,
    //         'msg'       => 'category created successfully',
    //         'category'      => $product
    //     ]);
    //
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $product->image = asset('storage/products/'. $product->image);
        if(!$product){
            return response()->json([
                'status' => false,
                'errNum' => 404,
                'msg'   => 'product not found',
            ]);
        }else{
            return response()->json([
                'status' => true,
                'product' => $product,
            ]);
        }

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $product = Product::find($id);
    //     $product->name          = $request->name;
    //     $product->description   = $request->description;
    //     $product->price         = $request->price;
    //     $product->save();
    //
    //     if(!$product){
    //         return response()->json([
    //             'status' => false,
    //             'errNum' => 404,
    //             'msg'    => 'product not found',
    //         ]);
    //     }else{
    //         return response()->json([
    //             'status'    => true,
    //             'msg'       => 'product updated successfully',
    //             'product'  => $product
    //         ]);
    //     }
    //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $product = Product::find($id);
    //     $product->delete();
    //
    //     if(!$product){
    //         return response()->json([
    //             'status' => false,
    //             'errNum' => 404,
    //             'msg'   => 'product not found',
    //         ]);
    //     }else{
    //         return response()->json([
    //             'status' => true,
    //             'msg' => 'product deleted successfully'
    //         ]);
    //     }
    //
    // }
}
