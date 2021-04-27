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

    public function getextra($id)
    {
        $product = Product::find($id);
        return $product->category->extras->groupBy('type');
    }


}
