<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - AlatAgri</title>
    <link rel="stylesheet" href="masuk-styles.css">
</head>
<body>
    <div class="auth-container">
        <div class="auth-box">
            <h1 class="title">AlatAgri</h1>
            
            <form class="auth-form register-form" action="register_proses.php" method="post">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input id="input" type="text" name="username"placeholder="Masukan Username" required>
                </div>
                
                <div class="input-group">
                    <label for="password">Password</label>
                    <input id="input" type="password" name="password" placeholder="Masukan Password" required>
                </div>

                <div class="input-group">
                    <label for="email">E-mail</label>
                    <input id="input" type="email" name="email" placeholder="Masukan E-mail" required>
                </div>
                
                <button type="submit" class="btn-auth" name="register" id="register">Register</button>
            </form>
            
            <div class="extra-links">
                <a href="login.php">Sudah punya akun? Login</a>
            </div>
        </div>
    </div>
</body>
</html>