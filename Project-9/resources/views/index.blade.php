@extends('layouts.master')
@section('title', 'Beranda')
@section('content')

    <main>
        <section class="hero-container">
            <div class="hero-image">
                <img src="{{ asset('assets/Foto.png') }}" alt="Traktor di ladang pertanian">
            </div>

            <div class="hero-content">
                <h1>Solusi Agribisnis Terlengkap untuk Hasil Optimal</h1>
                <p>Sewa alat pertanian dan peternakan modern, beli pupuk, bibit, pakan, hingga rennet berkualitas.</p>
                <div class="hero-buttons">
                    <button class="btn-primary">Belanja Produk Sekarang</button>
                    <button class="btn-secondary">Jelajahi Alat Sewa</button>
                </div>
            </div>
        </section>

    </main>
@endsection
