@extends('layouts.master')
@section('title', 'Daftar Toko')
@section('content')
    <h1 class="center-title">Daftar Toko</h1>

    @foreach ($shops as $shop)
        <div class="card">
            <img src="{{ asset('storage/' . $shop->image) }}" class="card-img">
            <h2>{{ $shop->shop_name }}</h2>
            <p>{{ $shop->address }}</p>
            <a class="btn" href="{{ route('user.shopDetail', $shop->id) }}">Lihat Produk</a>
        </div>
    @endforeach

    <div class="grid-container" id="shop-list"></div>
@endsection
