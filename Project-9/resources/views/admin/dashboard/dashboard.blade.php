@extends('admin.layouts.master')
@section('title', 'Dashboard Admin')

@section('content')
    <main class="main-content">

        <header class="main-header">
            <div class="header-left">
                <i class="fas fa-bars menu-toggle"></i>
                <h2>Dashboard</h2>
            </div>
        </header>

        {{-- ======== SECTION: SHOP LIST ======== --}}
        <section class="section-title">
            <h3>Daftar Toko Anda</h3>
        </section>

        <div class="shop-grid">
            @foreach ($shops as $shop)
                <div class="shop-card">

                    {{-- Header Toko --}}
                    <div class="shop-header">
                        <img src="{{ asset('storage/' . $shop->image) }}" alt="shop">
                        <h4>{{ $shop->shop_name }}</h4>
                    </div>

                    {{-- PRODUK DI TOKO --}}
                    <div class="product-mini-list">
                        @forelse ($shop->products as $product)
                            <div class="mini-item">
                                <span>{{ $product->product_name }}</span>

                                <div style="text-align: right">
                                    <span class="mini-price">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </span><br>
                                    <span class="stock">Stok: {{ $product->stock }}</span>
                                </div>
                            </div>
                        @empty
                            <p class="no-product">Belum ada produk</p>
                        @endforelse
                    </div>

                </div>
            @endforeach
        </div>

        {{-- ======== SECTION: ORDER HISTORY (TERPISAH) ======== --}}
        <section class="section-title" style="margin-top: 40px;">
            <h3>Riwayat Order</h3>
        </section>

        <div class="order-history">
            @forelse ($orders as $order)
                <div class="order-item">
                    <p><strong>Order ID:</strong> {{ $order->id }}</p>
                    <p><strong>Nama Produk:</strong> {{ $order->product->product_name }}</p>
                    <p><strong>Jumlah:</strong> {{ $order->quantity }}</p>
                    <p><strong>Nama Pemesan:</strong> {{ $order->customer_name }}</p>
                    <p><strong>Total:</strong> Rp {{ number_format($order->total, 0, ',', '.') }}</p>
                    <p><strong>Tanggal:</strong> {{ $order->created_at->format('d M Y') }}</p>
                </div>
            @empty
                <p>Belum ada order.</p>
            @endforelse
        </div>

    </main>
@endsection
