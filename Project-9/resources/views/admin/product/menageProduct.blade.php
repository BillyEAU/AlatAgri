@extends('admin.layouts.master')
@section('title', 'Laporan Penjualan')
@section('content')

    <main class="main-content">
        <header class="main-header">
            <div class="header-left">
                <i class="fas fa-bars menu-toggle"></i>
                <h2>Laporan Penjualan</h2>
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
            <form action="{{ route('products.create') }}">
                <button type="submit" class="btn-filter">Tambahkan Produk</button>
            </form>

            <div id="snackbar">Data telah diterapkan</div>
        </section>

        <section class="report-table">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Toko</th>
                        <th>Nama Produk</th>
                        <th>Gambar</th>
                        <th>Kategori</th>
                        <th>Jumlah</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Tanggal Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $index => $product)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $product->shop->shop_name }}</td>
                            <td>{{ $product->product_name }}</td>
                            <td><img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->product_name }}"
                                    width="100" height="100"></td>
                            <td>{{ $product->category->category_name }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->created_at }}</td>
                            <td>
                                <div>
                                    <a href="{{ route('products.show', $product->id) }}">
                                        <button type='button'>Edit</button>
                                    </a>

                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                        class="btn-delete">
                                        @csrf
                                        @method('DELETE')
                                        <button type='submit' class="btn-hapus" name='hapus'>Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
@endsection
