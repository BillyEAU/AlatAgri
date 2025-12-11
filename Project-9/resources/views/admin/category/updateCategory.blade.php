@extends('admin.layouts.master')
@section('title', 'Update Category')

@section('content')
    <main class="main-content">
        <header class="main-header">
            <div class="header-left">
                <i class="fas fa-bars menu-toggle"></i>
                <h2>Update Category</h2>
            </div>
        </header>

        <section class="filters">
            <div class="home-content">
                <h3>Masukkan Category</h3>
                <div class="form-login">
                    <form action="{{ route('categories.update' , $categories->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <label>Nama Category</label>
                        <input class="input" type="text" name="category_name" placeholder="Nama category" value="{{ $categories->category_name }}"/>


                        <button type="submit" class="btn-simpan" style="margin-top:10px;" name="simpan">Simpan</button>
                    </form>
                </div>
            </div>
        </section>
    </main>

@endsection
