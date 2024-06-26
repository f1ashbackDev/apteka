<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{

    public function show()
    {
        $basket = Basket::with('product', 'productImage')->where('user_id', '=', Auth::id())->get();
        return view('user.basket', [
            'basket' => $basket
        ]);
    }

    public function store(Request $request, Products $products)
    {
        $basket = Basket::where('user_id', '=', Auth::id())->get();

        if(count($basket) == 0){
            $basket_create = Basket::create([
                'user_id' => Auth::id(),
                'product_id' => $products->id,
                'count' => 1,
                'product_sum' => $products->price
            ]);
            return redirect()->route('basket');
        }

        foreach ($basket as $item){
            if($item->product_id == $products->id){
                $item->update([
                   'count' => $item->count + 1,
                    'product_sum' => $products->price * $item->count
                ]);
            }
        }
        return redirect()->route('basket');
    }

    public function update(Request $request, $product_id)
    {
        $basket_update = Basket::where('user_id', '=', Auth::id())->get();
        $product_price = Products::where('id', '=', $product_id)->sum('price');
        $count = $request->count;

        foreach ($basket_update as $item){
            if($item->product_id == $product_id){
                $item->update([
                    'count' => $count,
                    'product_sum' => $product_price * $count
                ]);
                return response()->json([
                    'totalPrice' => $product_price * $count
                ]);
            }
            return response()->json('Корзина с таким товаром не найдена');
        }
        return response()->json($basket_update);
    }

    public function delete(Basket $basket)
    {
        $basket->delete();
        return redirect()->route('basket');
    }
}
