@extends('admin.layouts.master')
@section('title', 'Update Toko')
@section('content')
    <main class="main-content">
        <header class="main-header">
            <div class="header-left">
                <i class="fas fa-bars menu-toggle"></i>
                <h2>Update Toko</h2>
            </div>
        </header>

        <section class="filters">
            <div class="home-content">
                <h3>Update Toko</h3>
                <div class="form-login">
                    <form action="{{ route('shop.update', $shop->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label for="nama">Nama Toko</label>
                        <input class="input" type="text" name="shop_name" id="shop_name" placeholder="Nama Toko"
                            value="{{ $shop->shop_name }}" />
                        <label for="owner_name">Nama Pemilik</label>
                        <input class="input" type="text" name="owner_name" id="owner_name" placeholder="owner_name"
                            value="{{ $shop->owner_name }}" />
                        <label for="address">Alamat</label>
                        <input class="input" type="text" name="address" id="address" placeholder="address"
                            value="{{ $shop->address }}" />
                        <label for="phone_number">Nomor
                            Telepon</label>
                        <input class="input" type="text" name="phone_number" id="phone_number"
                            placeholder="phone_number" value="{{ $shop->phone_number }}" />
                        <label>Gambar</label>

                        <div class="image-upload-wrapper">
                            <div class="upload-box">
                                <label for="gambar" class="upload-btn">Pilih Foto</label>
                                <input class="input-gambar" type="file" name="image" id="gambar" accept="image/*">
                                <span
                                    class="file-name">{{ $shop->image ? $shop->image : 'Tidak ada file yang dipilih' }}</span>
                            </div>

                            <div class="preview-box">
                                <img id="preview-image" src="{{ $shop->image ? asset('storage/' . $shop->image) : '' }}"
                                    class="preview-img" style="{{ $shop->image ? '' : 'display:none;' }}">
                            </div>
                        </div>

                        <button type="submit" class="btn-simpan" style="margin-top:10px;" name="simpan">Simpan</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
    </div>
@endsection
