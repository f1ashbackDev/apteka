<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catalogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CatalogsController extends Controller
{
    // Показ всех категорий товаров
    public function index()
    {
        return view('new_admin.catalogy')->with([
            'category'=>Catalogs::all()
        ]);
    }

    public function create()
    {
        return view('new_admin.catalog-create');
    }

    public function store(Request $request)
    {
        $path = $request->file('image')->store('category', 'public');
        Catalogs::create([
            'categories_name' => $request->name,
            'image' => $path
        ]);
        return redirect()->route('admin.category.index');
    }

    public function edit(Catalogs $category)
    {
        return view('new_admin.catalogy-edit',[
            'categories' => $category
        ]);
    }

    public function update(Request $request, Catalogs $category)
    {
        Storage::disk('public')->delete($category->image);
        $path = $request->file('image')->store('category', 'public');
        $category->update([
            'categories_name' => $request->name,
            'image' => $path
        ]);
        return redirect()->route('admin.category.index');
    }

    public function destroy(Catalogs $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index');
    }
}
