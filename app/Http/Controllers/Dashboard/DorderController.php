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
        $orders = Order::where('confirm', 0)->get();

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
}
