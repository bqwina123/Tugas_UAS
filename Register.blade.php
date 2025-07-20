<!DOCTYPE html>
<html>
<head>
    <title>Register Akun Perpustakaan</title>
    <style>
        body {
            background: linear-gradient(to right, #ff758c, #ff7eb3);
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 100px;
        }
        .register-box {
            background: white;
            padding: 40px;
            width: 320px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
        }
        input[type=text], input[type=password] {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            padding: 10px 20px;
            background: #ff758c;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 10px;
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
        a {
            text-decoration: none;
            color: #ff4d88;
            display: block;
            margin-top: 10px;
        }
        h2 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="register-box">
        <h2>📝 Daftar Akun Baru</h2>
        @if(session('error'))
            <div class="error">{{ session('error') }}</div>
        @endif
        <form method="POST" action="/register">
            @csrf
            <input type="text" name="nama" placeholder="Nama Lengkap" required><br>
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required><br>
            <button type="submit">Daftar</button>
        </form>
        <a href="{{ route('login') }}">⬅️ Kembali ke Login</a>
    </div>
</body>
</html>
