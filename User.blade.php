<!DOCTYPE html>
<html>
<head>
    <title>Dashboard User</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #eef5ff;
        }
        .sidebar {
            width: 220px;
            background: #0066cc;
            color: white;
            position: fixed;
            height: 100vh;
            padding-top: 20px;
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: white;
            text-decoration: none;
            font-size: 16px;
            margin: 5px 0;
        }
        .sidebar a:hover {
            background: #0050a0;
        }
        .main {
            margin-left: 230px;
            padding: 20px;
        }
        .box-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .box {
            background: white;
            flex: 1 1 200px;
            text-align: center;
            padding: 30px 20px;
            border-radius: 10px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
            transition: 0.3s;
        }
        .box:hover {
            transform: scale(1.03);
            background: #d9eaff;
        }
        .box a {
            color: #333;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
        }
        .logout {
            position: absolute;
            bottom: 20px;
            left: 20px;
            background: #ff4d4d;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            font-weight: bold;
        }
        .logout:hover {
            background: #cc0000;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>📘 User </h2>
        <a href="/user/cari">🔍 Cari Buku</a>
        <a href="/user/pinjam">📥 Pinjam Buku</a>
        <a href="/user/riwayat">📄 Riwayat</a>
        <a href="/user/detail">📘 Detail Buku</a>
        <a href="{{ route('logout') }}" class="logout">🔓 Logout</a>
    </div>

    <div class="main">
        <h1>Selamat datang, User 👋</h1>
        <div class="box-container">
            <div class="box">
                <a href="/user/cari">🔍<br>Cari Buku</a>
            </div>
            <div class="box">
                <a href="/user/pinjam">📥<br>Pinjam Buku</a>
            </div>
            <div class="box">
                <a href="/user/riwayat">📄<br>Riwayat</a>
            </div>
            <div class="box">
                <a href="/user/detail">📘<br>Detail Buku</a>
            </div>
        </div>
    </div>
</body>
</html>
