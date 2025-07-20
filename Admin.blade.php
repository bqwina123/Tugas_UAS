<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #f5f5f5;
        }
        .sidebar {
            width: 220px;
            background: #0072ff;
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
            background: #005ccc;
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
            background: #e6f0ff;
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
        <h2>📚 Admin </h2>
        <a href="/admin/buku">📚 Manajemen Buku</a>
        <a href="/admin/peminjaman">📖 Peminjaman Buku</a>
        <a href="/admin/pengguna">👥 Pengguna</a>
        <a href="/admin/laporan">📊 Laporan</a>
        <a href="{{ route('logout') }}" class="logout">🔓 Logout</a>
    </div>

    <div class="main">
        <h1>Selamat datang, Admin! 👋</h1>
        <div class="box-container">
            <div class="box">
                <a href="/admin/buku">📚<br>Manajemen Buku</a>
            </div>
            <div class="box">
                <a href="/admin/peminjaman">📖<br>Peminjaman Buku</a>
            </div>
            <div class="box">
                <a href="/admin/pengguna">👥<br>Manajemen Pengguna</a>
            </div>
            <div class="box">
                <a href="/admin/laporan">📊<br>Laporan</a>
            </div>
        </div>
    </div>
</body>
</html>
