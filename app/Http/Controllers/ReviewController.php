<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Products;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create(Request $request, $product_id)
    {
        Review::create([
           'name' => $request->name,
           'count' => $request->count,
           'text' => $request->text,
           'product_id' => $product_id
        ]);
        return redirect()->route('products.show', $product_id);
    }

    public function show()
    {
        return view('new_admin.reviews', [
            'reviews' => Review::with('product')->get()
        ]);
    }
}
