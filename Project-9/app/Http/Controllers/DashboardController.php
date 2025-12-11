<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $shops = Shop::with('products')->get();
        $orders = Order::latest()->get();
        return view('admin.dashboard.dashboard', compact('shops', 'orders'));
    }
}
