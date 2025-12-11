@extends('layouts.master')
@section('title', 'Detail Toko')

@section('content')
    <section class="produk-section">

        <h1 class="section-title">Produk dari {{ $shop->shop_name }}</h1>

        {{-- Grid harus 1x saja --}}
        <div class="card-grid">

            @foreach ($shop->products as $data)
                <div class="card">
                    <span class="badge">Baru</span>

                    <img src="{{ asset('storage/' . $data->image) }}" class="card-img" alt="Produk">

                    <div class="card-content">
                        <div class="card-title">{{ $data->product_name }}</div>
                        <div class="card-shop">{{ $shop->shop_name }}</div>
                        <div class="price">Rp {{ number_format($data->price, 0, ',', '.') }}</div>

                        <a href="{{ route('user.detailOrder', $data->id) }}" class="btn-pesan">
                            Pesan Sekarang
                        </a>
                    </div>
                </div>
            @endforeach

        </div>

    </section>
@endsection
