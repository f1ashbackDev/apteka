<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function store(Order $order)
    {
        $orderHistory = OrderItems::where('order_id', '=', $order->id)->with('image', 'product')->get();
        return view('user.historyOrder', [
            'order' => $order,
            'history' => $orderHistory
        ]);
    }
}
