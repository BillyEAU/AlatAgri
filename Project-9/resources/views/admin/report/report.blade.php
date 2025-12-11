@extends('admin.layouts.master')
@section('title', 'Laporan Seluruh Penjualan')
@section('content')

    <main class="main-content">
        <header class="main-header">
            <div class="header-left">
                <i class="fas fa-bars menu-toggle"></i>
                <h2>Laporan Seluruh Penjualan</h2>
                
            </div>
            <div class="header-right">
                <div class="location-dropdown">
                    <span>Lokasi</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
            </div>
        </header>
        
        <section class="filters">
            <div class="filter-group">
                <label for="start-date">Tanggal Mulai</label>
                <input type="date" id="start-date">
            </div>
            <div class="filter-group">
                <label for="end-date">Tanggal Akhir</label>
                <input type="date" id="end-date">
            </div>
            <div class="filter-group">
                <label for="category">Kategori</label>
                <select id="category">
                    <option>Semua</option>
                    <option>Pupuk</option>
                    <option>Enzim</option>
                    <option>Alat Pertanian</option>
                </select>
            </div>
            <button onclick="myFunction()" class="btn-filter">Terapkan Filter</button>
            <a href="{{ route('report.pdf') }}" class="btn-download">Download PDF</a>
            <div id="snackbar">Data telah diterapkan</div>
        </section>
        
        <section class="report-table">
            <table>
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Nama Pembeli</th>
                        <th>Nomor Telepon</th>
                        <th>Alamat Pembeli</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->product->product_name }}</td>
                            <td>{{ $order->customer_name }}</td>
                            <td>{{ $order->customer_address }}</td>
                            <td>{{ $order->customer_phone }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->total_price }}</td>
                            <td>{{ $order->status }}</td>
                            <td>{{ $order->created_at }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </section>
    </main>
@endsection
