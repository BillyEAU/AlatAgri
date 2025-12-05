<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlatAgri - Produk</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <header class="top-header">
        <strong class="title">AlatAgri</strong>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Tentang Kami</a></li>
                <li><a href="#">Produk</a></li>
                <li><a href="#">Pelayanan Kami</a></li>
                <li><a href="#">Kontak</a></li>
                <li><a href="login.php" class="btn_signin">Sign In</a></li>
            </ul>
        </nav>
    </header>
    <div class="gabung">
        <h1>Teks</h1>
        <div class="card1">
            <?php
            include 'koneksi.php';
					$sql = "SELECT * FROM tbl_produk";
					$result = mysqli_query($koneksi, $sql);
					if (mysqli_num_rows($result) == 0) {
						echo "
                         <tr>
				<td colspan='5' align='center'>
                           Data Kosong
                        </td>
			   </tr>
				";
                    }
                    while ($data = mysqli_fetch_assoc($result)) {
						    echo "
            <img src='../img-produk/$data[gambar_produk]'>
            <h1>$data[nama_produk]</h1>
            <h2>$data[nama_toko]</h2>
            <h2>$data[harga]</h2>
            <h2>$data[jenis]</h2>
            ";
                    }
            ?>
        </div>
        <div class="card1">
            <h1>
                tes
            </h1>
        </div>
    </div>
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
</body>
<script src="script.js">

</script>
</html>