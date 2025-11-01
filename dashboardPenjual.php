
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - AlatAgri</title>
    <link rel="stylesheet" href="dashboard-styles.css">
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
                    <li class="active"><a href="#"><i class="fas fa-th-large"></i> Dashboard</a></li>
                    <li><a href="laporanPenjual.php"><i class="fas fa-chart-bar"></i> Laporan</a></li>
                    <li><a href="index.php" id="logout-btn"><i class="fas fa-sign-out-alt"></i> Log out</a></li>
                </ul>
            </nav>
        </aside>

        <main class="main-content">
            <header class="main-header">
                <div class="header-left">
                    <i class="fas fa-bars menu-toggle"></i>
                    <h2>Dashboard</h2>
                </div>
                <div class="header-right">
                    <div class="location-dropdown">
                        <span>Lokasi</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
            </header>

            <section class="cards-container">
                <div class="card">
                    <h3>Pertanian</h3>
                    <img src="https://em-content.zobj.net/source/microsoft-teams/363/sheaf-of-rice_1f33e.png" alt="Ikon Pertanian">
                </div>
                <div class="card">
                    <h3>Peternakan</h3>
                    <img src="https://em-content.zobj.net/source/microsoft-teams/363/cow-face_1f42e.png" alt="Ikon Peternakan">
                </div>
            </section>

            <section class="products-table">
                <h3>Produk Terlaris</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Pupuk Organik</td>
                            <td>Pupuk</td>
                            <td>240</td>
                        </tr>
                        <tr>
                            <td>Pupuk Anorganik</td>
                            <td>Pupuk</td>
                            <td>302</td>
                        </tr>
                        <tr>
                            <td>Rennet</td>
                            <td>Enzim</td>
                            <td>302</td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </main>
        
    </div>
</body>
<script>
    // popup
    const logOut = document.getElementById('logout-btn');
    // event
    logOut.addEventListener('click', function() {
    const pilihan = confirm('Ingin ke halaman Index?');
    if (pilihan == false){
        alert('Pengguna membatalkan')
        event.preventDefault();
    } else {
        console.log('Mengalihkan Anda ke Index');
    }
});
</script>
</html>
