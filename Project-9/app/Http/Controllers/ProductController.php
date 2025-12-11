<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function index()
    {

        $products = Product::with('shop', 'category')->get();
        return view('admin.product.menageProduct', compact('products'));
    }


    public function create()
    {
        $shops = Shop::where('user_id', Auth::id())->get();
        $categories = CategoryProduct::all();

        return view('admin.product.addProduct', compact('shops', 'categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|max:2048',
            'category_id' => 'required|integer',
            'shop_id' => 'required|integer',

        ]);
        
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
        }
        
        Product::create([
            'product_name' => $request->product_name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'shop_id' => $request->shop_id,
            'image' => $imagePath,
        ]);
        

        return redirect()->route('products')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function show($id)
    {
        $products = Product::findOrFail($id);
        $shops = Shop::where('user_id', Auth::id())->get();
        $categories = CategoryProduct::all();
        return view('admin.product.updateProduct', compact('products', 'shops', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|max:2048',
            'category_id' => 'required|integer',
            'shop_id' => 'required|integer',
        ]);

        $product = Product::findOrFail($id);

        $imagePath = $product->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
        }

        $product->update([
            'product_name' => $request->product_name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'shop_id' => $request->shop_id,
            'image' => $imagePath,
        ]);

        return redirect()->route('products')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products')->with('success', 'Produk berhasil dihapus.');
    }
}
