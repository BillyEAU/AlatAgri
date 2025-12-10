<?php
session_start();
include 'koneksi.php';
$loggedin = isset($_SESSION['id_user']) ? 'true' : 'false';
$orangnya = '';
if (isset($_SESSION['id_user'])) {
    $idnya = (int)$_SESSION['id_user'];
    $result = mysqli_query(
        $koneksi,
        "SELECT username FROM tbl_user WHERE id_user = $idnya"
    );
    $row = mysqli_fetch_assoc($result);
    $orangnya = $row['username'] ?? '';
} else {
    $idnya = 0;
}

?>
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
    <h1 style="text-align: center;padding-top: 20px;">Produk</h1>
    
    <div class="gabung">
            <?php
            include 'koneksi.php';
            // if (isset($_SESSION['id_user']))
                $sql = "SELECT tu.id_user, tp.*, tt.nama_toko from tbl_penjual tt JOIN tbl_user tu on tt.id_user = tu.id_user JOIN tbl_produk tp on tt.id_penjual = tp.id_penjual;";
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
                
                <div class='card1' data-id='$data[id_produk]' style='cursor: pointer;'>
                <img src='img-produk/$data[gambar_produk]'>
                <h1>$data[nama_produk]</h1>
                <h2>Toko : $data[nama_toko]</h2>
                <h2>Rp $data[harga]</h2>
                <h2>Jenis : $data[jenis]</h2>
                </div>
            ";
            
        }
        ?>

    </div>
    <div id="myModal" class="modal-container" style="display: none;" onclick="tutupModal()">
        <div class="modal-dialog" onclick="event.stopPropagation()">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Pengisian</h1>
                    <button type="button" class="btn-close" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form> 
                        <input type="hidden" name="id_produk" id="id_produk" value="">
                        <input type="hidden" name="nama_orang" id="nama_orang" value="">
                        <input type="hidden" name="nama_produk" id="nama_produk" value="">
                        <input type="hidden" name="harga" id="harga" value="">
                        <div class="form-group">
                            <label class="labelmodal">Jumlah Pesanan :</label>
                            <div class="quantity-wrapper">
                                <button type="button" class="qty-btn" onclick="ubahJumlah(-1)">&#9660;</button>
                                <input class="inputJumlah" type="number" id="jumlah" name="jumlah" value="1" min="1" oninput="validasiManual(this)">
                                <button type="button" class="qty-btn" onclick="ubahJumlah(1)">&#9650;</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="labelmodal" for="hp">No. Telephone : </label>                            
                            <input class="inputdata" type="text" id="hp">
                        </div>
                        <div class="form-group">
                            <label class="labelmodal" for="hp">Alamat : </label>                            
                            <input class="inputalamat" type="text" id="alamat">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="tutupModal()">Keluar</button>
                    <button type="button" class="btn btn-yes" onclick="bukaModal2()">Lanjutkan</button>
                    </div>
            </div>
        </div>
    </div>
    <div id="myModal2" class="modal-container" onclick="tutupModal2()">
				<div class="modal-dialog" onclick="event.stopPropagation()">
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title" style="color:  #2c3e50; font-size: 32px;">Data Transaksi</h1>
							<button type="button" class="btn-close" aria-label="Close" onclick="tutupModal2()"></button>
						</div>
						<form action="pembelian/pembelian.php" method="post">
							<div class="modal-body">
								<h4> Kategori</h4>
								<div class="form-group">
									<label class="labelmodal" for="detail-nama" class="col-form-label">Nama Produk:</label>
									<input class="inputdata" type="text" name="detail-nama" class="form-control" id="detail-nama" readonly>
								</div>
								<div class="form-group">
									<label class="labelmodal" for="detail-harga" class="col-form-label">Harga :</label>
									<input class="inputdata" type="text" name="detail-harga" class="form-control" id="detail-harga" readonly>
								</div>
								<h4>Pembeli</h4>
								<div class="form-group">
									<label class="labelmodal" for="detail-orang" class="col-form-label">Nama :</label>
									<input class="inputdata" name="detail-orang" type="text" class="form-control" id="detail-orang" readonly>
								</div>
								<div class="form-group">
									<label class="labelmodal" for="detail-hp" class="col-form-label">No. Hp
										:</label>
									<input class="inputdata" name="detail-hp" type="text" class="form-control" id="detail-hp" readonly>
								</div>
								<div class="form-group">
									<label class="labelmodal" for="detail-alamat" class="col-form-label">Alamat:</label>
									<textarea class="inputalamat" name="detail-alamat" class="form-control" id="detail-alamat" readonly></textarea>
								</div>
								<input type="hidden" name="detail-status" value="success">

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" onclick="kembaliKeModalPertama()">Kembali</button>
								<button name="simpan" type="submit" class="btn btn-yellow" onclick="lakukanPembayaran()">Lakukan
									Pembayaran</button>
							</div>
						</form>
					</div>
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
        <script>
            
            const signIn = document.querySelector('.btn_signin');
            // event
            signIn.addEventListener('click', function() {
                const pilihan = confirm('Ingin ke halaman Login?');
                if (pilihan == false){
                    alert('Pengguna membatalkan')
                    event.preventDefault();
                } else {
                    console.log('Mengalihkan Anda ke halaman Login');
                }
            });
            const navList = document.querySelector('nav ul');
            const serviceLink = navList.children[3];
            if (serviceLink.textContent.includes('Pelayanan Kami')) {
                navList.removeChild(serviceLink);
                console.log("Tautan 'Pelayanan Kami' telah dihapus.");
            }
            
            var sip = "<?php echo $loggedin;?>";
            console.log("User login : ", sip);
            const beli = document.querySelectorAll('.card1');
            if (beli.length > 0){
                beli.forEach(card => {
                    card.addEventListener('click', function(event){
                        const idProduk = this.getAttribute('data-id');
                        console.log('Tekan');
                        console.log('Id produk : ',idProduk)
                        if(sip === 'false'){
                            event.preventDefault();
                            const pilih = confirm('Login terlebih dahulu');
                            if(pilih === true){
                                window.location.href = 'login.php';
                            } else{
                                console.log('User membatalkan login');
                            }
                        } else {
                            bukaModal(idProduk);
                        }
                    });
                });
            }
            var selectedProductId;
		// Fungsi Modal
        const userLogin = {
            id: "<?php echo (int)$idnya?>",
            username: "<?php echo addslashes($orangnya); ?>"
        };
		function bukaModal(idProduk) {
			console.log('Product Id:', idProduk);
            console.log('Ini kenapa ' + userLogin.username);
			selectedProductId = idProduk;
            if(userLogin.id != 0){
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var productData = JSON.parse(xhr.responseText);
                        console.log('Nama produk : ' + productData.nama_produk);
                        console.log('Harga produk : ' + productData.harga);
                        console.log('id orangnya : ' + userLogin.id);
                        console.log('Nama orangnya : ', userLogin.username);
                        // Perbarui input tersembunyi
                        document.getElementById('id_produk').value = idProduk;
                        document.getElementById('nama_orang').value = userLogin.username;
                        document.getElementById('nama_produk').value = productData.nama_produk;
                        document.getElementById('harga').value = productData.harga;
                        document.getElementById("myModal").style.display = "flex";
                    }
                };
            }
			xhr.open("GET", "get_produk.php?id_produk=" + idProduk, true);
			xhr.send();
		}

		function tutupModal() {
			document.getElementById("myModal").style.display = "none";
		}

		function tutupModal2() {
			document.getElementById("myModal2").style.display = "none";
		}

		function bukaModal2() {
			tutupModal();
			document.getElementById("myModal2").style.display = "flex";
			// var nama = ;
			var nomorhp = document.getElementById("hp").value;
			var alamat = document.getElementById("alamat").value;
			// kategori
			var nama = document.getElementById("nama_produk").value;
			var harga = document.getElementById("harga").value;
			var orang = document.getElementById("nama_orang").value;
            var jumlah = document.getElementById("jumlah").value;
            
            console.log('siapa '+ orang);
            
			document.getElementById("detail-nama").value = nama;
			document.getElementById("detail-harga").value = jumlah * harga; 
			document.getElementById("detail-hp").value = nomorhp;
			document.getElementById("detail-alamat").value = alamat;
			document.getElementById("detail-orang").value = orang;


            
		}

		function kembaliKeModalPertama() {
			tutupModal2();
			bukaModal();
		}

		function lakukanPembayaran() {
			alert("Pembayaran berhasil!");
			tutupModal2();
			document.getElementById("nama_produk").value = "";
			document.getElementById("hp").value = "";
			document.getElementById("alamat").value = "";
		}
        // Fungsi untuk tombol Panah Atas/Bawah
        function ubahJumlah(delta) {
            var input = document.getElementById('jumlah');
            var nilaiSekarang = parseInt(input.value) || 0; // Jika kosong dianggap 0
            var hasil = nilaiSekarang + delta;

            // Cek agar tidak kurang dari 1
            if (hasil < 1) {
                hasil = 1;
            }

            input.value = hasil;
        }

        // Fungsi Validasi saat User mengetik manual
        function validasiManual(input) {
            // 1. Hapus karakter selain angka
            input.value = input.value.replace(/[^0-9]/g, '');

            // 2. Jika user mengetik 0 atau kosong, paksa jadi 1 (opsional)
            // (Bisa dihapus jika ingin membiarkan kosong sebentar)
            if (input.value === '' || parseInt(input.value) < 1) {
                // input.value = 1; // Uncomment jika ingin auto-koreksi langsung
            }
        }
    </script>

</html>