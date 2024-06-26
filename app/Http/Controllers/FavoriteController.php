<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function show()
    {
        $favorite = Favorite::with('product', 'productImage')->where('user_id', '=', Auth::id())->get();
        return view('user.favorite',[
            'favorite' => $favorite
        ]);
    }

    public function store(Products $products)
    {
        Favorite::create([
            'user_id' => Auth::id(),
            'product_id' => $products->id
        ]);
        return view('user.favorite');
    }

    public function delete(Products $products)
    {
        return view();
    }
}
