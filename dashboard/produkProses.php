<?php 
session_start();
include '../koneksi.php';

if (!isset($_SESSION['id_penjual'])) {
    echo "
        <script>
            alert('Sesi login Anda telah berakhir. Silakan login kembali.');
            window.location.href = '../login.php'; // Arahkan ke halaman login yang benar
        </script>
    ";
    exit();
}

$id_penjual = $_SESSION['id_penjual'];

function upload() {
    $namaFile = $_FILES['photo']['name'];
    $error = $_FILES['photo']['error'];
    $tmpName = $_FILES['photo']['tmp_name'];


    if($error === 4) {
        echo "
            <script>
                alert('Gambar Harus Diisi');
                window.location = 'tambahProduk.php';
            </script>
        ";

        return false;
    }

    $ekstentiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if(!in_array($ekstensiGambar, $ekstentiGambarValid)) {
        echo "
            <script>
                alert('File Harus Berupa Gambar');
                window.location = 'tambahProduk.php';
            </script>
        ";
        return null;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    $oke =  move_uploaded_file($tmpName, '../img-produk/' . $namaFileBaru);
    return $namaFileBaru;

}

if(isset($_POST['simpan'])) {
    $kategori = (int)$_POST['kategori'];
    $harga = $_POST['harga'];
    $stok = $_POST['jumlah'];
    $photo = upload();
    $jenis = $_POST['jenis'];
    $tgl = $_POST['tanggal'];
    $nama = $_POST['nama'];
    $description = $_POST['deskripsi'];
    if($stok > 0){
        $status = 'Tersedia';
    } elseif ($stok < 0) {
        $status = 'Disembunyikan';
    } else {
        $status = 'Habis';
    }

    if(!$photo) {
        return false;
    }
    var_dump($id_penjual, $harga, $stok, $photo, $kategori, $jenis, $status, $tgl, $nama, $description);

    $sql = "INSERT INTO tbl_produk (
            id_penjual, harga, stok, gambar_produk, 
            id_kategori, jenis, status_produk, tgl_penambahan, 
            nama_produk, deskripsi_produk
        ) VALUES (
            $id_penjual, 
            $harga, 
            $stok, 
            '$photo', 
            $kategori, 
            '$jenis', 
            '$status', 
            '$tgl', 
            '$nama', 
            '$description'
        )";

    if( empty($harga)|| empty($stok)|| empty($photo)|| empty($kategori)|| empty($jenis)|| empty($tgl)|| empty($nama)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data $id_penjual');
                window.location = 'tambahProduk.php';
            </script>
        ";
    } elseif(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Produk Berhasil Ditambahkan');
                window.location = 'kelolaProduk.php'
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'tambahProduk.php'
            </script>
        ";
    }
}elseif(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $kategori = (int)$_POST['kategori'];
    $harga = $_POST['harga'];
    $stok = $_POST['jumlah'];
    
    $jenis = $_POST['jenis'];
    $tgl = $_POST['tanggal'];
    $nama = $_POST['nama'];
    $description = $_POST['deskripsi'];

    $photoLama = $_POST['photoLama'];
    if($stok > 0){
        $status = 'Tersedia';
    } elseif ($stok < 0) {
        $status = 'Disembunyikan';
    } else {
        $status = 'Habis';
    } 

    if($_FILES['photo']['error']) {
        $photo = $photoLama;
    }else {
        unlink('../img-produk' . $photoLama);
        $photo = upload();
    }

    $sql = "UPDATE tbl_produk SET 
            id_penjual = $id_penjual,
            harga = $harga,
            stok = $stok,
            gambar_produk = '$photo',
            id_kategori = $kategori,
            jenis = '$jenis',
            status_produk = '$status',
            tgl_penambahan = '$tgl',
            nama_produk = '$nama',
            deskripsi_produk = '$description'
            WHERE id_produk = $id 
            ";
            
    if(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Produk Berhasil Diubah');
                window.location = 'kelolaProduk.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'editProduk.php';
            </script>
        ";
    }
}elseif(isset($_POST['hapus'])) {
    $id = $_POST['id'];

    // hapus gambar
    $sql = "SELECT * FROM tbl_produk WHERE id_produk = $id";
    $result = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_assoc($result);
    $photo = $row['photo'];
    unlink('../img_categories/' . $photo);
    
    $sql = "DELETE FROM tbl_produk WHERE id_produk = $id";
    if(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Produk Berhasil Dihapus');
                window.location = 'kelolaProduk.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Data Produk Gagal Dihapus');
                window.location = 'kelolaProduk.php';
            </script>
        ";
    }
}else {
    header('location: kelolaProduk.php');
}