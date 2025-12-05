<?php
include 'koneksi.php';

if(isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    $sql = "INSERT INTO tbl_user VALUES(NULL, '$username', NULL, '$email', '$password', NULL, NULL, NULL, NULL)";

    if(empty($username) || empty($password) || empty($email)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'register.php';
            </script>
        ";
    }elseif(mysqli_query($koneksi, $sql)) {
        echo "  
            <script>
                alert('Registrasi Berhasil Silahkan login');
                window.location = 'login.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'register.php';
            </script>
        ";
    }
}
?>