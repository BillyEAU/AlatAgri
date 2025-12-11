<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - AlatAgri</title>
    <link rel="stylesheet" href="{{ asset('css/masuk-styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <div class="auth-container">
        <div class="auth-box">
            <h1 class="title">AlatAgri</h1>

            <form class="auth-form register-form" action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="input-group">
                    <label for="email">E-mail</label>
                    <input id="input" type="email" name="email" placeholder="Masukan E-mail" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input id="input" type="password" name="password" placeholder="Masukan Password" required>
                </div>

                <button class="btn-auth" type="submit" name="login" id="login">Login</button>
            </form>

            <div class="extra-links">
                <a href="{{ route('register') }}">Belum punya akun?</a>
                <a href="{{ route('index') }}">Kembali</a>
            </div>
        </div>
    </div>
    @include('layouts.script')
</body>

</html>
