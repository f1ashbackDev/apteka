<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function show(Request $request)
    {
        $result = Products::where('name', 'LIKE', $request->name)->with('image')->get();
        return view('search', [
            'name_find' => $request->name,
            'products' => $result
        ]);
    }
}
