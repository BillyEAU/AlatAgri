<?php 
session_start();
include 'koneksi.php';

if(isset($_POST['login'])) {
  $requestUsername = $_POST['username'];
  $requestPassword = $_POST['password'];

  $sql = "SELECT id_user, username, password, role FROM tbl_user WHERE username = '$requestUsername'";
  $result = mysqli_query($koneksi, $sql);
  
  if(mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $hashed_pass = $row['password'];
    if (password_verify($requestPassword, $hashed_pass)) {
            $_SESSION['id_user'] = $row['id_user']; 
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role']; 
            $_SESSION['logged_in'] = true;
            switch($_SESSION['role']){
              case 'admin':
                $id_user_sekarang = $row['id_user'];
                $cek_penjual = mysqli_query($koneksi, "SELECT id_penjual FROM tbl_penjual WHERE id_user = '$id_user_saat_ini'");
                if($data_penjual = mysqli_fetch_assoc($cek_penjual)){
                    $_SESSION['id_penjual'] = $data_penjual['id_penjual']; // Ini akan bernilai 1
                } else {
                    // Jaga-jaga jika user sudah daftar tapi belum bikin toko
                    echo "<script>alert('Akun anda belum terdaftar sebagai penjual!'); window.location='login.php';</script>";
                    exit();
                }
                header('location:dashboard/dashboard.php');
                break;
              case 'penjual':
                $_SESSION['id_penjual'] = $row['id_user']; 
                header('location:dashboard/dashboardPenjual.php');
                break;
              case 'pembeli':
              default:
                header('location:produk.php');
                break;
              }
            
            exit();
      } else { 
          echo "
          <script>
            alert('email atau password anda salah, Silahkan coba lagi');
            window.location = 'login.php';
          </script>
          ";
      }
    } else { 
        echo "
        <script>
          alert('pengguna tidak ditemukan, Silahkan coba lagi');
          window.location = 'login.php';
        </script>
        ";
    }
}


?>
