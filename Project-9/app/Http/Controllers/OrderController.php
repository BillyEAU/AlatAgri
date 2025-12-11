<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function detailOrder($id)
    {
        $order = Product::findOrFail($id);
        return view('user.order', compact('order'));
    }
    public function history()
    {
        $orders = Order::with('product')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('user.history', compact('orders'));
    }
    public function store(Request $request, $id)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_address' => 'required|string|max:500',
            'customer_phone' => 'required|string|max:15',
            'quantity' => 'required|integer|min:1',
        ]);

        $total_price = Product::findOrFail($id)->price * $request->quantity;
        $request->merge(['total_price' => $total_price]);

        $product = Product::findOrFail($id);
        $product->update([
            'stock' => $product->stock - $request->quantity,
        ]);

        Order::create([
            'user_id' => Auth::id(),
            'product_id' => $id,
            'customer_name' => $request->customer_name,
            'customer_address' => $request->customer_address,
            'customer_phone' => $request->customer_phone,
            'quantity' => $request->quantity,
            'total_price' => $request->total_price,
            'status' => 'success',
        ]);

        return redirect()->route('index')->with('success', 'Pemesanan berhasil dibuat.');
    }
}
