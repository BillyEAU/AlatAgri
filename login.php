<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - AlatAgri</title>
    <link rel="stylesheet" href="css/masuk-styles.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="auth-container">
        <div class="auth-box">
            <h1 class="title">AlatAgri</h1>
            
            <form class="auth-form login-form" action="login_proses.php" method="POST">
                <input type="text" id="username" name="username" placeholder="Masukan Username" required>
                <input type="password" id="password" name="password" placeholder="Masukan Password" required>
                <button class="btn-auth" type="submit" name="login" id="login">Login</button>
            </form>
            
            <div class="extra-links">
                <a href="register.php">Belum punya akun?</a>
                <a href="index.php">Kembali</a>
            </div>
        </div>
    </div>
    
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