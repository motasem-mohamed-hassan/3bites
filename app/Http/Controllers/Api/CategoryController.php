<?php

namespace App\Http\Controllers\Api;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')->where('id','!=', 1)->get();
        foreach($categories as $category){
            foreach($category->products as $product){
                $product->sizes;
            }
        }

        foreach($categories as $category){
            $category->image = asset('storage/categories/'. $category->image);
            foreach($category->products as $product){
                $product->image = asset('storage/products/'. $product->image);
            }
        }


        if($categories->isEmpty()){
            return response()->json([
                'status' => true,
                'msg'   => 'no data',
                'categories' => $categories
            ]);
        }else{
            return response()->json([
                'status' => true,
                'categories' => $categories,
            ]);
        }
    }

    // public function store(Request $request)
    // {
    //     $category = new Category();
    //     $category->name = $request->name;
    //     $category->description = $request->description;
    //     $category->save();
    //
    //     return response()->json([
    //         'status'    => true,
    //         'msg'       => 'category created successfully',
    //         'category'      => $category
    //     ]);
    // }

    public function show($id)
    {
        $category = Category::with('products')->where('id', $id)->first();
        $category->image = asset('storage/categories/'. $category->image);
        foreach($category->products as $product){
            $product->image =  asset('storage/products/'. $product->image);
        }

        if(!$category){
            return response()->json([
                'status' => false,
                'errNum' => 404,
                'msg'   => 'category not found',
            ]);
        }else{
            return response()->json([
                'status' => true,
                'category' => $category,
            ]);
        }
    }


    // public function update(Request $request, $id)
    // {
    //     $category = Category::find($id);
    //     $category->name = $request->name;
    //     $category->description = $request->description;
    //     $category->save();
    //
    //     if(!$category){
    //         return response()->json([
    //             'status' => false,
    //             'errNum' => 404,
    //             'msg'    => 'category not found',
    //         ]);
    //     }else{
    //         return response()->json([
    //             'status'    => true,
    //             'msg'       => 'category updated successfully',
    //             'category'  => $category
    //         ]);
    //     }
    // }
    //
    //
    // public function destroy($id)
    // {
    //     $category = Category::find($id);
    //     $category->delete();
    //
    //     if(!$category){
    //         return response()->json([
    //             'status' => false,
    //             'errNum' => 404,
    //             'msg'   => 'category not found',
    //         ]);
    //     }else{
    //         return response()->json([
    //             'status' => true,
    //             'msg' => 'category deleted successfully'
    //         ]);
    //     }
    // }



}
