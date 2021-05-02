<?php

namespace App\Http\Controllers\Dashboard;

use App\Order;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DorderController extends Controller
{

    public function waiting()
    {
        Auth::guard('admin')->user()->unreadNotifications->markAsRead();
        $orders = Order::where('confirm', 0)->with('oproducts')->get();

        return view('dashboard.waiting-orders', compact('orders'));
    }

    public function confirm($order_id, FlasherInterface $flasher)
    {
        $order = Order::find($order_id);
        $order->confirm = 1;
        $order->save();

        $flasher->addSuccess('Order has been Confirmed');
        return back();
    }

    public function confirmAll(FlasherInterface $flasher)
    {
        $orders = Order::where('confirm', 0)->get();

        foreach ($orders as $order) {
            $order->confirm = 1;
            $order->save();
        }
        $flasher->addSuccess('All orders has been Confirmed');
        return back();
    }

    public function confirmed()
    {
        $orders = Order::where('confirm', 1)->get();

        return view('dashboard.confirmed-orders', compact('orders'));
    }

    public function delete($order_id, FlasherInterface $flasher)
    {
        Order::findOrFail($order_id)->delete();

        $flasher->addInfo('Order has been deleted.');
        return back();
    }

    public function deleteAll(FlasherInterface $flasher)
    {
        $orders = Order::where('confirm', true)->get();
        foreach($orders as $order){
            $order->delete();
        }
        $flasher->addInfo('All order has been deleted.');
        return back();
    }

}
