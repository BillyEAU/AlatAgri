@extends('admin.layouts.master')
@section('title', 'Tambah Category')

@section('content')
    <main class="main-content">
        <header class="main-header">
            <div class="header-left">
                <i class="fas fa-bars menu-toggle"></i>
                <h2>Tambah Category</h2>
            </div>
        </header>

        <section class="filters">
            <div class="home-content">
                <h3>Masukkan Category</h3>
                <div class="form-login">
                    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <label>Nama Category</label>
                        <input class="input" type="text" name="category_name" placeholder="Nama Toko" />
                        <button type="submit" class="btn-simpan" style="margin-top:10px;" name="simpan">Simpan</button>
                    </form>
                </div>
            </div>
        </section>
    </main>

@endsection
