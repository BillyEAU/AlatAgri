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
                <form action="../dashboard/tambahProduk.php">
                    <button onclick="" class="btn-filter">Tambahkan Produk</button>
                </form>
                
                <div id="snackbar">Data telah diterapkan</div>
            </section>

            <section class="report-table">
                <table>
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Jumlah</th>
                            <th>Jenis</th>
                            <th>Status</th>
                            <th>Tanggal Penambahan</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                    <?php
                        include '../koneksi.php';
                        if (isset($_SESSION['id_penjual'])) {
                            $id_penjual = $_SESSION['id_user'];
                        } else {
                            echo "<script>window.location='../login.php';</script>";
                            exit();
                        }

                        $sql = "
                            SELECT 
                                tp.*, 
                                tk.nama_kategori 
                            FROM 
                                tbl_produk tp
                            JOIN 
                                tbl_kategori tk 
                            ON 
                                tp.id_kategori = tk.id_kategori
                            WHERE 
                                tp.id_penjual = '$id_penjual'
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
                            <td><img class='Timg' src='../img-produk/$data[gambar_produk]'></td>
                            <td>$data[nama_produk]</td>
                            <td>$data[nama_kategori]</td>
                            <td>$data[stok]</td>
                            <td>$data[jenis]</td>
                            <td>$data[status_produk]</td>
                            <td>$data[tgl_penambahan]</td>
                            <td>$data[deskripsi_produk]</td>
                            <td>$data[harga]</td>
                            <td>
                            <div>
                            <a href='editProduk.php?id=$data[id_produk]'>
                            <button type='button'>Edit</button>
                            </a>
                            
                            <form action='produkProses.php' method='POST' onsubmit=\"return confirm('Anda yakin?');\">
                            <input type='hidden' name='id' value='$data[id_produk]'>
                            <button type='submit' name='hapus'>Delete</button>
                            </form>
                            </div>
                            </td>
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