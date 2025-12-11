@extends('admin.layouts.master')
@section('title', 'Update Produk')
@section('content')
    <main class="main-content">
        <header class="main-header">
            <div class="header-left">
                <i class="fas fa-bars menu-toggle"></i>
                <h2>Update Produk</h2>
            </div>
            <div class="header-right">
                <div class="location-dropdown">
                    <span>Lokasi</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
            </div>
        </header>

        <section class="filters">
            <div class="home-content">
                <h3>Masukkan Produk</h3>
                <div class="form-login">
                    <form action="{{ route('products.update', $products->id) }}') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label for="shop_id">Pilih Toko</label>
                        <select name="shop_id" id="shop_id">
                            {{-- <option value="">Pilih Toko</option> --}}
                            @foreach ($shops as $shops)
                                <option value="{{ $shops->id }}"
                                    {{ $products->shops_id == $shops->id ? 'selected' : '' }}>
                                    {{ $shops->shop_name }}</option>
                            @endforeach
                        </select>
                        <label for="product_name">Nama Produk</label>
                        <input class="input" type="text" name="product_name" id="product_name"
                            value="{{ $products->product_name }}" placeholder="Nama Produk" />
                        <label for="category_id">Kategori</label>
                        <select name="category_id" id="category_id">
                            {{-- <option value="">Pilih Kategori</option> --}}
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}"
                                    {{ $products->categories_id == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->category_name }}
                                </option>
                            @endforeach
                        </select>
                        <label for="price">Harga</label>
                        <input class="input" type="text" name="price" id="price" placeholder="Harga"
                            value="{{ $products->price }}" />
                        <label for="stock">Stock</label>
                        <input class="input" type="text" name="stock" id="stock" placeholder="Stock"
                            value="{{ $products->stock }}" />
                        <label for="description">Deskripsi</label>
                        <input class="input" type="text" name="description" id="description" placeholder="Deskripsi"
                            value="{{ $products->description }}" />
                        <label>Gambar</label>

                        <div class="image-upload-wrapper">
                            <div class="upload-box">
                                <label for="gambar" class="upload-btn">Pilih Foto</label>
                                <input class="input-gambar" type="file" name="image" id="gambar" accept="image/*">
                                <span
                                    class="file-name">{{ $products->image ? $products->image : 'Tidak ada file yang dipilih' }}</span>
                            </div>

                            <div class="preview-box">
                                <img id="preview-image"
                                    src="{{ $products->image ? asset('storage/' . $products->image) : '' }}"
                                    class="preview-img" style="{{ $products->image ? '' : 'display:none;' }}">
                            </div>
                        </div>
                        <button type="submit" class="btn-simpan" name="simpan">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </main>
    </div>
@endsection
