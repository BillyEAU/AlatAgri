<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        $shop = Shop::where('user_id', Auth::id())->get();
        return view('admin.shop.shop', compact('shop'));
    }

    public function create()
    {
        return view('admin.shop.addShop');
    }

    public function store(Request $request)
    {

        $request->validate([
            'shop_name' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'phone_number' => 'required|string|max:20',
            'image' => 'nullable|image|max:2048',
        ]);
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('shop_images', 'public');
        }

        $code = 'SHOP' . rand(1000, 9999);
        $request->merge(['code_shop' => $code]);

        if (Shop::where('code_shop', $code)->exists()) {
            return back()->withErrors(['code_shop' => 'Kode toko sudah ada. Silakan coba lagi.']);
        }
        Shop::create([
            'user_id' => Auth::id(),
            'shop_name' => $request->shop_name,
            'owner_name' => $request->owner_name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'image' => $imagePath,
            'code_shop' => $request->code_shop,
        ]);

        return redirect()->route('shop')->with('success', 'Toko berhasil ditambahkan.');
    }

    public function show($id)
    {
        $shop = Shop::findOrFail($id);
        return view('admin.shop.updateShop', compact('shop'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'shop_name' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'phone_number' => 'required|string|max:20',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('shop_images', 'public');
        }

        $shop = Shop::findOrFail($id);
        $shop->update([
            'shop_name' => $request->shop_name,
            'owner_name' => $request->owner_name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'image' => $imagePath ?? $shop->image,
        ]);

        return redirect()->route('shop')->with('success', 'Toko berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $shop = Shop::findOrFail($id);
        $shop->delete();

        return redirect()->back()->with('success', 'Toko berhasil dihapus.');
    }
}
