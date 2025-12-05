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
                    <li><a href="index.php" id="logout-btn"><i class="fas fa-sign-out-alt"></i> Log out</a></li>
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
                <button onclick="" class="btn-filter">Tambahkan Penjualan</button>
                <div id="snackbar">Data telah diterapkan</div>
            </section>

            <section class="report-table">
                <table>
                    <thead>
                        <tr>
                            <th>ID Pesanan</th>
                            <th>Tanggal</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#00124</td>
                            <td>05 Okt 2025</td>
                            <td>Pupuk Organik</td>
                            <td>Pupuk</td>
                            <td>10</td>
                            <td>Rp 500.000</td>
                        </tr>
                        <tr>
                            <td>#00125</td>
                            <td>04 Okt 2025</td>
                            <td>Rennet</td>
                            <td>Enzim</td>
                            <td>5</td>
                            <td>Rp 250.000</td>
                        </tr>
                        <tr>
                            <td>#00126</td>
                            <td>04 Okt 2025</td>
                            <td>Pupuk Anorganik</td>
                            <td>Pupuk</td>
                            <td>20</td>
                            <td>Rp 1.000.000</td>
                        </tr>
                        <tr>
                            <td>#00127</td>
                            <td>03 Okt 2025</td>
                            <td>Sewa Traktor</td>
                            <td>Alat Pertanian</td>
                            <td>1</td>
                            <td>Rp 750.000</td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</body>
<script src="../script.js">

</script>

</html>