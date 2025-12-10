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
                // $id_user_sekarang = $row['id_user'];
                $_SESSION['id_admin'] = $row['id_user'];
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
