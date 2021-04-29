<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Oextra;
use App\Oproduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store_order(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->user_name = $request->user_name;
        $order->user_phone = $request->user_phone;
        $order->user_email = $request->user_email;
        $order->lang = $request->lang;
        $order->lati = $request->lati;
        $order->type = $request->type;
        $order->save();

        foreach ($request->products as $product) {
            $p = new Oproduct();
            $p->order_id = $order->id;
            $p->product_id = $product->product_id;
            $p->name = $product->name;
            $p->price = $product->price;
            $p->size_name = $product->size_name;
            $p->size_price = $product->size_price;
            $p->quantity = $product->quantity;
            $p->save();
            foreach ($product->extras as $extra) {
                $e = new Oextra();
                $e->oproduct_id = $p->id;
                $e->extra_name = $extra->extra_name;
                $e->price = $extra->price;
                $e->save();
            }
            $p->extras_price = $p->oextras->sum('price');
            $p->total = $product->total;
            $p->update();
        }
        $order->products_price = $request->products_price;
        $order->hst = $request->hst;
        $order->tip = $request->tip;
        $order->delivery_cost = $request->delivery_cost;
        $order->total = $request->total;
        $order->update();

        //Notification
        // $admin = Admin::get();
        // Notification::send($admin, new NewOrder($order));

        return response()->json([
            'status'    => true,
            'msg'       => 'Order stored successfully',
            'category'      => $order
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
