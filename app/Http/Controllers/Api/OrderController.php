<?php

namespace App\Http\Controllers\Api;

use App\Admin;
use App\Gift;
use App\Order;
use App\Oextra;
use App\Oproduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\OrderNotification;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Notification;
use Mockery\Undefined;

class OrderController extends Controller
{
    public function store_order(Request $request)
    {

        $order = new Order();

        $order->user_id = $request->user_id;
        $order->user_name = $request->user_name;
        $order->user_phone = $request->user_phone;
        $order->user_email = $request->user_email;
        $order->lang = $request->lang;
        $order->lati = $request->lati;
        $order->address = $request->address;
        $order->type = $request->type;

        $order->products_price = $request->products_price;
        $order->hst = $request->hst;
        $order->tip = $request->tip;
        $order->delivery_cost = $request->delivery_cost;
        $order->total = $request->total;

        $order->save();

        foreach ($request->products as $product) {
            $p = new Oproduct();
            $p->order_id = $order->id;
            $p->product_id = $product['product_id'];
            $p->name = $product['name'];
            $p->price = $product['price'];
            $p->size_name = $product['size_name'];
            $p->size_price = $product['size_price'];
            $p->quantity = $product['quantity'];
            $p->extras_price = $product['extras_price'];
            $p->total = $product['total'];
            $p->note = $product['note'];
            $p->save();
            foreach ($product['extras'] as $extra) {
                $e = new Oextra();
                $e->oproduct_id = $p->id;
                $e->extra_name = $extra['extra_name'];
                $e->price = $extra['price'];
                $e->type = $extra['type'];
                $e->save();
            }
            if($request->has('user_id')){
                $user = User::find($request->user_id);

                if(isset($product['gift_points'])){
                    $user->decrement('points', $product['gift_points']);
                    $gift = Gift::where('product_id', $product['product_id'] )->first();
                    $gift->increment('order_count', 1);
                }else{
                    $user->increment('points', ($product['product']['points']* $product['quantity']));
                }
            }
        }

        //notification
        $admin = Admin::get();
        Notification::send($admin, new OrderNotification($order));

        return response()->json([
            'status'    => true,
            'msg'       => 'Order stored successfully',
            'order'      => $order
        ]);

    }

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
