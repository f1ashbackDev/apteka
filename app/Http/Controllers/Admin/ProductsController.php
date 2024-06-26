<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Catalogs;
use App\Models\Image;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function index()
    {
        return view('new_admin.product',[
            'products' => Products::with('image', 'category')->get(),
            'category' => Catalogs::all()
        ]);
    }

    public function create()
    {
        return view('new_admin.product-add', [
           'categories' => Catalogs::all()
        ]);
    }

    public function store(Request $request)
    {
        $product = Products::create([
            'name' => $request->name,
            'count' => $request->count,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category
        ]);
        foreach ($request->file('image') as $item){
            $path = $item->store('products', 'public');
            $image = new Image();
            $image->image = $path;
            $image->products_id = $product->id;
            $image->save();
        }
        return redirect()->route('admin.products.index');
    }

    public function edit(Products $products)
    {
        return view('new_admin.product-edit', [
           'product' => $products,
           'image' => $products->image,
           'name_category' => $products->category->categories_name,
            'category' => Catalogs::all()
        ]);
    }

    public function update(Request $request, Products $products)
    {
        if($request->has('name')) {
            $products->update([
                'name' => $request->name
            ]);
        }
        if ($request->has('count')){
            $products->update([
                'count' => $request->count
            ]);
        }
        if($request->has('price')){
            $products->update([
                'price' => $request->price
            ]);
        }
        if($request->has('description')){
            $products->update([
               'description' => $request->description
            ]);
        }
        if($request->has('category_id')){
            $products->update([
                'category_id' => $request->category_id
            ]);
        }
        if($request->hasFile('image')){
            $image = Image::where(['products_id' => $products->id])->get();
            foreach ($image as $item){
                Storage::disk('public')->delete($item->image);
                $item->delete();
            }
            foreach ($request->file('image') as $item){
                $path = $item->store('products', 'public');
                $image = new Image();
                $image->image = $path;
                $image->products_id = $products->id;
                $image->save();
            }
        }
        return redirect()->route('admin.products.index');
    }

    public function delete(Products $products)
    {
        $image = Image::where(['products_id' => $products->id])->get();
        foreach ($image as $item){
            Storage::disk('public')->delete($item->image);
            $item->delete();
        }
        $products->delete();
        return redirect()->route('admin.products.index');
    }
}
