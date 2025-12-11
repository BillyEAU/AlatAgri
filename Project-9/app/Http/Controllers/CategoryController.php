<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = CategoryProduct::all();
        return view('admin.category.category', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.addCategory');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        CategoryProduct::create([
            'category_name' => $request->category_name,
        ]);

        return redirect()->route('categories')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function show($id)
    {
        $categories = CategoryProduct::findOrFail($id);
        return view('admin.category.updateCategory', compact('categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $category = CategoryProduct::findOrFail($id);
        $category->update([
            'category_name' => $request->category_name,
        ]);

        return redirect()->route('categories')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $category = CategoryProduct::findOrFail($id);
        $category->delete();

        return redirect()->route('categories')->with('success', 'Kategori berhasil dihapus.');
    }
}
