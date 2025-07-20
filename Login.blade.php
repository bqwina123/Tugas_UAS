<!DOCTYPE html>
<html>
<head>
    <title>Login Perpustakaan Daerah</title>
    <style>
        body {
            background: linear-gradient(to right, #00c6ff, #0072ff);
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 100px;
        }
        .login-box {
            background: white;
            padding: 40px;
            width: 300px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
        }
        input[type=text], input[type=password] {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #aaa;
        }
        button {
            padding: 10px 20px;
            background: #0072ff;
            color: white;
            border: none;
            border-radius: 5px;
        }
        .error {
            color: red;
        }
        a {
            text-decoration: none;
            color: #0072ff;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>🔐 Login Perpustakaan</h2>
        @if(session('error'))
            <div class="error">{{ session('error') }}</div>
        @endif
        <form method="POST" action="/login">
            @csrf
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Login</button>
        </form>
        <p>Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>
    </div>
</body>
</html>
