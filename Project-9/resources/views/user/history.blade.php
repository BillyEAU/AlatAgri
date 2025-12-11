@extends('layouts.master')
@section('title', 'Riwayat Pesanan')

@section('content')
    <section class="history-section">
        <h1 class="section-title">Riwayat Pesanan</h1>

        @if ($orders->isEmpty())
            <p class="empty-text">Belum ada pesanan.</p>
        @endif

        <div class="history-list">
            <div class="history-grid">

                @foreach ($orders as $order)
                    <div class="history-card">
                        <img src="{{ asset('storage/' . $order->product->image) }}" class="history-img">

                        <div class="history-info">
                            <h2>{{ $order->product->product_name }}</h2>
                            <p>Harga: Rp{{ number_format($order->product->price) }}</p>
                            <p>Jumlah: {{ $order->quantity }}</p>
                            <p>Total: <b>Rp{{ number_format($order->total_price) }}</b></p>
                            <p class="status {{ $order->status }}">
                                Status: {{ ucfirst($order->status) }}
                            </p>
                            <small class="date">{{ $order->created_at->format('d M Y H:i') }}</small>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
@endsection
