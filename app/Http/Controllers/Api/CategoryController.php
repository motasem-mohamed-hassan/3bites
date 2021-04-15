<?php

namespace App\Http\Controllers\Api;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return response()->json([
            'status'    => true,
            'category'      => $category
        ]);

    }

    public function index()
    {
        $categories = Category::all();

        if($categories->isEmpty()){
            return response()->json([
                'status' => false,
                'errNum' => 404,
                'msg'   => 'no data',
            ]);
        }else{
            return response()->json([
                'status' => true,
                'categories' => $categories
            ]);
        }
    }

}
