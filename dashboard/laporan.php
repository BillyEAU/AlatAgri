

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
                    <li><a href="dashboard.php"><i class="fas fa-th-large"></i> Dashboard</a></li>
                    <li class="active"><a href="laporan.php"><i class="fas fa-chart-bar"></i> Laporan</a></li>
                    <li class="kelola"><a href="../dashboard/kelolaPenjual.php"><i class="fas fa-chart-bar"></i> Kelola Penjual</a></li>
                    <li><a href="../logout.php" id="logout-btn"><i class="fas fa-sign-out-alt"></i> Log out</a></li>
                </ul>
            </nav>
        </aside>

        <main class="main-content">
            <header class="main-header">
                <div class="header-left">
                    <i class="fas fa-bars menu-toggle"></i>
                    <h2>Laporan Seluruh Penjualan</h2>
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
                <form action="../pembelian/pembelian-cetak.php">
                   <button class="btn-filter">
                   cetak
                   </button>
                </form>
                <div id="snackbar">Data telah diterapkan</div>
            </section>

            <section class="report-table">
                <table>
                    <thead>
                        <tr>
                            <th>Pembeli</th>
                            <th>Nomor Hp</th>
                            <th>Total</th>
                            <th>Alamat</th>
                            <th>Kurir</th>
                            <th>Resi</th>
                            <th>Status</th>
                            <th>Tanggal Pembelian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../koneksi.php';
                        $sql = "
                            SELECT 
                                *
                            FROM 
                                tbl_pembelian 
                            ";
					$result = mysqli_query($koneksi, $sql);
					if (mysqli_num_rows($result) == 0) {
						echo "
                        <tr>
                            <td colspan='10' align='center'>
                                    Data Kosong
                                    </td>
                        </tr>
                            ";
                                }
                        while ($data = mysqli_fetch_assoc($result)) {
						echo "
                        <tr>
                            <td>$data[nama_user]</td>
                            <td>$data[nomor_hp]</td>
                            <td>$data[total_harga]</td>
                            <td>$data[alamat_pengiriman]</td>
                            <td>$data[kurir]</td>
                            <td>$data[resi]</td>
                            <td>$data[status_pembelian]</td>
                            <td>$data[tgl_pembelian]</td>
                        </tr>
                        ";
                        }?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</body>
<script src="../script.js">

</script>

</html>