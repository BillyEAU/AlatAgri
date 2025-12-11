@extends('admin.layouts.master')
@section('title', 'Tambah Toko')

@section('content')
    <main class="main-content">
        <header class="main-header">
            <div class="header-left">
                <i class="fas fa-bars menu-toggle"></i>
                <h2>Tambah Toko</h2>
            </div>
        </header>

        <section class="filters">
            <div class="home-content">
                <h3>Masukkan Toko</h3>
                <div class="form-login">
                    <form action="{{ route('shop.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <label>Nama Toko</label>
                        <input class="input" type="text" name="shop_name" placeholder="Nama Toko" />

                        <label>Nama Pemilik</label>
                        <input class="input" type="text" name="owner_name" placeholder="Nama Pemilik" />

                        <label>Alamat</label>
                        <input class="input" type="text" name="address" placeholder="Alamat" />

                        <label>Nomor Telepon</label>
                        <input class="input" type="text" name="phone_number" placeholder="Nomor Telepon" />

                        <label>Gambar</label>

                        <div class="image-upload-wrapper">
                            <div class="upload-box">
                                <label for="gambar" class="upload-btn">Pilih Foto</label>
                                <input class="input-gambar" type="file" name="image" id="gambar" accept="image/*">
                                <span class="file-name">Tidak ada file yang dipilih</span>
                            </div>

                            <div class="preview-box">
                                <img id="preview-image" src="" class="preview-img">
                            </div>
                        </div>
                        <button type="submit" class="btn-simpan" style="margin-top:10px;" name="simpan">Simpan</button>
                    </form>
                </div>
            </div>
        </section>
    </main>

@endsection
