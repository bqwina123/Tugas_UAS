<!DOCTYPE html>
<html>
<head>
    <title>📋 Riwayat Peminjaman</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
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
            margin-bottom: 15px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-back {
            background: #007bff;
            color: white;
            float: right;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
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

<h2>📋 Riwayat Peminjaman Buku</h2>
<a href="/dashboard" class="btn btn-back">🔙 Kembali ke Dashboard</a>

@php
    $riwayat = [
        ['id' => 1, 'nama' => 'Ahmad', 'tgl_pinjam' => '2025-07-01', 'tgl_kembali' => '2025-07-07', 'status' => 'Dikembalikan'],
        ['id' => 2, 'nama' => 'Budi', 'tgl_pinjam' => '2025-07-02', 'tgl_kembali' => '2025-07-08', 'status' => 'Dikembalikan'],
        ['id' => 3, 'nama' => 'Citra', 'tgl_pinjam' => '2025-07-03', 'tgl_kembali' => '2025-07-10', 'status' => 'Dipinjam'],
        ['id' => 4, 'nama' => 'Dian', 'tgl_pinjam' => '2025-07-04', 'tgl_kembali' => '2025-07-11', 'status' => 'Dikembalikan'],
        ['id' => 5, 'nama' => 'Eka', 'tgl_pinjam' => '2025-07-05', 'tgl_kembali' => '2025-07-12', 'status' => 'Dipinjam'],
    ];
@endphp

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($riwayat as $r)
        <tr>
            <td>{{ $r['id'] }}</td>
            <td>{{ $r['nama'] }}</td>
            <td>{{ $r['tgl_pinjam'] }}</td>
            <td>{{ $r['tgl_kembali'] }}</td>
            <td>{{ $r['status'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
