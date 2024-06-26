<?php

namespace App\Http\Controllers;

use App\Models\Catalogs;
use App\Models\Products;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        return view('index',[
            'products' => Products::with('image', 'category')->take(4)->get(),
            'category' => Catalogs::all()
        ]);
    }

    public function login()
    {
        return view('user.login');
    }

    public function register()
    {
        return view('user.register');
    }
}
