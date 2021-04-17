<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // public function store_order(Request $request)
    // {
    //     $order = new Order();
    //     $order->user_id = $request->user_id;
    //     $order->address = $request->address;
    //     $order->phone = $request->phone;
    //     $order->total = $request->total;
    //     $order->save();

    //     $products = $request->products;

    //     foreach($products as $product){
    //         $order->products()->attach($product['id'], ['quantity' => $product['quantity']]);
    //         $table = Product::find($product['id']);
    //         $table->increment('order_count', $product['quantity']);
    //     }

    //     //Notification
    //     // $admin = Admin::get();
    //     // Notification::send($admin, new NewOrder($order));

    //     return response()->json([
    //         'status'    => true,
    //         'msg'       => 'Order stored successfully',
    //         'category'      => $order
    //     ]);

    // }

    // public function get_order_list($user_id)
    // {
    //     $order = Order::where('user_id', $user_id)->latest()->get();

    //     if(!$order){
    //         return $this->returnError('001', 'هذا الطلب غير موجود');
    //     }
    //     return $this->returnData('order', $order);
    // }

    // public function cancel_order(Request $request)
    // {
    //     $order = Order::where('id', $request->order_id)->where('user_id', $request->user_id)->first();
    //     $order->status = 4;
    //     $order->save();

    //     if(!$order){
    //         return $this->returnError('001', 'هذا الطلب غير موجود');
    //     }
    //     return $this->returnData('order', $order);
    // }

    // public function get_order_details($order_id)
    // {
    //     $order = Order::where('id',$order_id)->with('products')->first();

    //     if(!$order){
    //         return $this->returnError('001', 'هذا الطلب غير موجود');
    //     }
    //     return $this->returnData('order', $order);

    // }

}
