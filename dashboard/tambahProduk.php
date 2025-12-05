<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan - AlatAgri</title>
    <link rel="stylesheet" href="../css/dashboard-styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="sidebar-header">
                <h1 class="title">AlatAgri</h1>
            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li class="<?php echo ($now == 'dashboardPenjual.php') ?' active' : '';?>"><a href="dashboardPenjual.php"><i class="fas fa-th-large"></i> Dashboard</a></li>
                    <li class="<?php echo ($now == 'laporanPenjual.php') ?' active' : '';?>"><a href="laporanPenjual.php"><i class="fas fa-chart-bar"></i> Laporan</a></li>
                    <li class="<?php echo ($now == 'kelolaProduk.php') ?' active' : '';?>"><a href="kelolaProduk.php"><i class="fas fa-chart-bar"></i> Produk</a></li>
                    <li><a href="../index.php" id="logout-btn"><i class="fas fa-sign-out-alt"></i> Log out</a></li>
                </ul>
            </nav>
        </aside>

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
                <div class="home-content">
			        <h3>Input Categories</h3>
                    <div class="form-login">
                        <form action="produkProses.php" method="post" enctype="multipart/form-data">
                            <label for="nama">Nama</label>
                            <input class="input" type="text" name="nama" id="nama" placeholder="Nama" />
                            <label for="kategori">Kategori</label>
                            <select name="kategori" id="kategori">
                                <option value="1">Pupuk</option>
                                <option value="2">Enzim</option>
                                <option value="3">Alat Pertanian</option>
                            </select>
                            <label for="jumlah">Jumlah</label>
                            
                            <input class="input" type="text" name="jumlah" id="jumlah" placeholder="Jumlah" />
                            <label for="jenis">Jenis</label>
                            <input class="input" type="text" name="jenis" id="jenis" placeholder="Jenis" />
                            <label for="tanggal">Tanggal</label>
                            <input class="input" type="date" name="tanggal" id="tanggal" placeholder="Tanggal" />
                            <label for="deskripsi">Deskripsi</label>
                            <input class="input" type="text" name="deskripsi" id="deskripsi" placeholder="Deskripsi" />
                            <label for="harga">Harga</label>
                            <input class="input" type="text" name="harga" id="harga" placeholder="Harga" />
                            <label for="photo">Gambar</label>
                            <div class="inimg">
                                <label for="gambar" class="custom">pilih foto</label>
                                <input class="input-gambar" type="file" name="photo" id="gambar"/>  
                                <span class="file-name">Tidak ada file yang dipilih</span>  
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
</body>
<script>
    
    document.getElementById('gambar').addEventListener('change', function() {

        const fileName = this.files[0] ? this.files[0].name : 'Tidak ada file dipilih';
        
        document.querySelector('.file-name').textContent = fileName;
    });
</script>

</html>