<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $shop = Shop::with('products')->get();
        return view('index', compact('shop'));
    }


    public function shop()
    {
        $shops = Shop::all();
        return view('user.shop', compact('shops'));
    }
    public function shopDetail($id)
    {
        $shop = Shop::with('products')->findOrFail($id);
        return view('user.shopDetail', compact('shop'));
    }
}
