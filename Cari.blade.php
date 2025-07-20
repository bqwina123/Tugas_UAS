<!DOCTYPE html>
<html>
<head>
    <title>🔍 Cari Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f3f3;
            padding: 40px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .btn {
            padding: 6px 14px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            margin: 5px;
            cursor: pointer;
        }

        .btn-back {
            background: #007bff;
            color: white;
            float: right;
            margin-bottom: 15px;
            text-decoration: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>

<h2>📚 Daftar Buku</h2>
<a href="/dashboard" class="btn btn-back">🔙 Kembali ke Dashboard</a>

@php
    $buku = [
        ['id_buku' => 1, 'judul_buku' => 'Laravel Dasar', 'penulis' => 'Andre Hirata', 'penerbit' => 'Informatika', 'kategori' => 'Pemrograman', 'status' => 'Tersedia'],
        ['id_buku' => 2, 'judul_buku' => 'PHP untuk Pemula', 'penulis' => 'Tari Liya', 'penerbit' => 'Informatika', 'kategori' => 'Pemrograman', 'status' => 'Tersedia'],
        ['id_buku' => 3, 'judul_buku' => 'Desain UI/UX', 'penulis' => 'Ahmad Fauzi', 'penerbit' => 'Komputer', 'kategori' => 'Desain', 'status' => 'Dipinjam'],
        ['id_buku' => 4, 'judul_buku' => 'Basis Data', 'penulis' => 'Henry Munawuru', 'penerbit' => 'Analisis Sistem', 'kategori' => 'Database', 'status' => 'Tersedia'],
        ['id_buku' => 5, 'judul_buku' => 'HTML & CSS', 'penulis' => 'Pida Bayu', 'penerbit' => 'Websiteku', 'kategori' => 'Web', 'status' => 'Dipinjam'],
        
    ];
@endphp

<table>
    <tr>
        <th>ID</th>
        <th>Judul Buku</th>
        <th>Penulis</th>
        <th>Penerbit</th>
        <th>Kategori</th>
        <th>Status</th>
    </tr>

    @foreach($buku as $b)
    <tr>
        <td>{{ $b['id_buku'] }}</td>
        <td>{{ $b['judul_buku'] }}</td>
        <td>{{ $b['penulis'] }}</td>
        <td>{{ $b['penerbit'] }}</td>
        <td>{{ $b['kategori'] }}</td>
        <td>{{ $b['status'] }}</td>
    </tr>
    @endforeach
</table>

</body>
</html>
