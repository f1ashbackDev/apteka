<?php

namespace App\Http\Controllers;

use App\Models\Catalogs;
use App\Models\Products;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category', [
            'category' => Catalogs::all()
        ]);
    }
    public function show(Catalogs $category)
    {
        return view('products-category', [
            'category_name' => $category->categories_name,
            'products' => $category->product()->paginate(6)
        ]);
    }
}
