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
            <form action="{{ route('shop.create') }}">
                <button class="btn-filter">Add Toko</button>
            </form>
            <div id="snackbar">Data telah diterapkan</div>
        </section>

        <section class="report-table">
            <table>
                <thead>
                    <tr>
                        <th>Kode Toko</th>
                        <th>Nama Toko</th>
                        <th>Gambar</th>
                        <th>Nama Penjual</th>
                        <th>Alamat</th>
                        <th>No Telp</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($shop as $shop)
                        <tr>
                            <td>{{ $shop->code_shop }}</td>
                            <td>{{ $shop->shop_name }}</td>
                            <td><img src="{{ asset('storage/' . $shop->image) }}" alt="Gambar Toko" width="100"></td>
                            <td>{{ $shop->owner_name }}</td>
                            <td>{{ $shop->address }}</td>
                            <td>{{ $shop->phone_number }}</td>
                            <td>
                                <a href="{{ route('shop.show', $shop->id) }}" class="btn-edit">
                                    <button type="button">
                                        Edit
                                    </button>
                                </a>
                                <form action="{{ route('shop.destroy', $shop->id) }}" method="POST" class="btn-delete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-hapus">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
@endsection
