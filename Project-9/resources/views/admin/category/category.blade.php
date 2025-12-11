@extends('admin.layouts.master')
@section('title', 'category')
@section('content')

    <main class="main-content">
        <header class="main-header">
            <div class="header-left">
                <i class="fas fa-bars menu-toggle"></i>
                <h2>category</h2>
            </div>
        </header>

        <section class="filters">
            <form action="{{ route('categories.create') }}">
                <button class="btn-filter">Add Category</button>
            </form>
            <div id="snackbar">Data telah diterapkan</div>
        </section>

        <section class="report-table">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Category</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $index => $cat)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $cat->category_name }}</td>
                            <td>
                                <a href="{{ route('categories.show', $cat->id) }}" class="btn-edit">
                                    <button type="button">
                                        Edit
                                    </button>
                                </a>
                                <form action="{{ route('categories.destroy', $cat->id) }}" method="POST"
                                    class="btn-delete">
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
