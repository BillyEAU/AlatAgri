<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - AlatAgri</title>
    <link rel="stylesheet" href="masuk-styles.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="auth-container">
        <div class="auth-box">
            <h1 class="title">AlatAgri</h1>
            
            <form class="auth-form login-form" method="POST" id="loginForm">
                <input type="text" id="UserInput" name="UserInput" placeholder="Masukan Username" required>
                <input type="password" id="PassInput" name="PassInput" placeholder="Masukan Password" required>
                <button class="btn-auth" type="submit" name="login">Login</button>
            </form>
            
            <div class="extra-links">
                <a href="register.php">Belum punya akun?</a>
                <a href="index.php">Kembali</a>
            </div>
        </div>
    </div>
    <?php
    $penjual = "aron";
    $admin = "admin";
    $passwordAdmin = "adminadmin";
    $password = "123";

    if(isset($_POST['login'])){
        $userInput = $_POST['UserInput'];
        $passInput = $_POST['PassInput'];

        if($userInput === $penjual && $passInput === $password){
            header("Location: dashboardPenjual.php");
            exit;
        } else if($userInput === $admin && $passInput === $passwordAdmin) {
            header("Location: dashboard.php");
            exit;
        }
        else {
            echo "<script>alert('Username atau Password salah');</script>";
        }
    }
    ?>
</body>
<script>
    // popup
    const correct = document.querySelector('.btn-auth');
    const userInput = document.querySelector('#UserInput');
    // event
    form.addEventListener('submit', function(event) {
    event.preventDefault();
    const nama = userInput.value;
    const pilih = confirm(`Tuan/Nyonya ${nama} yakin?`);
    if (pilih == true){
        form.submit();
    } else {
        alert('Login dibatalkan')
    }
    });
</script>
</html>