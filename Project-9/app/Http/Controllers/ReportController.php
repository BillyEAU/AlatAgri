<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Shop;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();
        return view('admin.report.report', compact('orders'));
    }

    public function exportPDF()
    {
        // ambil data order sesuai kebutuhan
        $orders = Order::with('product')->get();

        $pdf = PDF::loadView('admin.report.report_pdf', compact('orders'));
        return $pdf->download('laporan_penjualan.pdf');
    }
}
