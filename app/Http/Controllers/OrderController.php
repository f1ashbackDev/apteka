<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $order = Order::where('user_id', '=', Auth::id())->get();
        if(!empty($order)){
            $orderItems = [];
            foreach ($order as $item) {
                $result = OrderItems::where('order_id', '=', $item->id)->with('image', 'product')->get();
                if(!empty($result)){
                    foreach ($result as $item_result){
                        $orderItems[] = $item_result;
                    }
                }
            }
            return view('user.order',[
                'order' => $order,
                'orderItems' => $orderItems
            ]);

        }
        return view('user.order', [
            'order' => []
        ]);
    }

    public function create()
    {
        $user_basket = Basket::where('user_id', '=', Auth::id())->get();
        $order = Order::create([
            'user_id' => Auth::id()
        ]);

        foreach ($user_basket as $item)
        {
            $product_count = Products::find($item->product_id);
            if($product_count->count() < 0){
                break;
            }
            $product_count->count = $product_count->count - $item->count;
            $product_count->save();
            OrderItems::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'count' => $item->count,
                'sum' => $item->count * $product_count->price
            ]);
            $item->delete();
        }
        return redirect('/user/orders');
    }
}
