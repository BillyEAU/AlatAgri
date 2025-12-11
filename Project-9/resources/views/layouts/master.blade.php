<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlatAgri - Home</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>

    <header class="top-header">
        <strong class="title">AlatAgri</strong>
        <nav>
            <ul>
                <li><a href="{{ route('index') }}">Home</a></li>
                <li><a href="#">Tentang Kami</a></li>
                <li><a href="{{ route('user.shop') }}" class="active">Produk</a></li>
                <li><a href="#">Pelayanan Kami</a></li>
                <li><a href="#">Kontak</a></li>
                <li><a href="{{ route('user.orderHistory') }}">Riwayat</a></li>
                <li><a href="{{ route('login') }}" class="btn_signin">Sign In</a></li>
            </ul>
        </nav>
    </header>
    @yield('content')
    <footer class="footer">
        <div class="footer-grid">
            <div class="footer-column">
                <h3>AlatAgri</h3>
                <p>Platform terpercaya untuk penyewaan alat dan penjualan produk agribisnis berkualitas di Indonesia.
                </p>
                <div class="social-links">
                </div>
            </div>
            <div class="footer-column">
                <h3>Jelajahi</h3>
                <ul>
                    <li><a href="#">Sewa Alat Pertanian</a></li>
                    <li><a href="#">Sewa Alat Peternakan</a></li>
                    <li><a href="#">Beli Produk</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Bantuan</h3>
                <ul>
                    <li><a href="#">Cara Memesan</a></li>
                    <li><a href="#">Pertanyaan Umum (FAQ)</a></li>
                    <li><a href="#">Hubungi Kami</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 AlatAgri</p>
        </div>
    </footer>
    @include('layouts.script')
</body>


</html>
