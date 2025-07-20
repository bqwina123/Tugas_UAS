<!DOCTYPE html>
<html>
<head>
    <title>📑 Manajemen Laporan</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f9f9f9; padding: 40px; }
        h2 { text-align: center; }

        .btn {
            padding: 6px 14px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            margin: 2px;
            cursor: pointer;
        }

        .btn-tambah { background: #28a745; color: white; }
        .btn-edit { background: #ffc107; color: black; }
        .btn-simpan { background: #17a2b8; color: white; }
        .btn-hapus { background: #dc3545; color: white; }
        .btn-back { background: #007bff; color: white; float: right; margin-bottom: 20px; }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        th { background-color: #007bff; color: white; }

        input[type="text"], input[type="date"], input[type="number"] {
            padding: 5px;
            width: 150px;
        }

        .form-box {
            background: white;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<h2>📋 Manajemen Laporan</h2>
<a href="/dashboard" class="btn btn-back">🔙 Kembali ke Dashboard</a>

<form class="form-box" method="POST" action="/admin/laporan/tambah">
    @csrf
    <input type="text" name="laporan" placeholder="Judul Laporan" required>
    <input type="text" name="jenis_laporan" placeholder="Jenis" required>
    <input type="date" name="tanggal_laporan" required>
    <input type="number" name="jumlah_buku" placeholder="Jumlah" required>
    <input type="text" name="keterangan" placeholder="Keterangan" required>
    <button class="btn btn-tambah">➕ Tambah</button>
</form>

<table>
    <tr>
        <th>ID</th>
        <th>Laporan</th>
        <th>Jenis</th>
        <th>Tanggal</th>
        <th>Jumlah</th>
        <th>Keterangan</th>
        <th>Aksi</th>
    </tr>

    @foreach($laporan as $l)
        @if(isset($edit_id) && $edit_id == $l['id'])
        <tr>
            <form method="POST" action="/admin/laporan/update">
                @csrf
                <td>{{ $l['id'] }}<input type="hidden" name="id" value="{{ $l['id'] }}"></td>
                <td><input type="text" name="laporan" value="{{ $l['laporan'] }}"></td>
                <td><input type="text" name="jenis_laporan" value="{{ $l['jenis_laporan'] }}"></td>
                <td><input type="date" name="tanggal_laporan" value="{{ $l['tanggal_laporan'] }}"></td>
                <td><input type="number" name="jumlah_buku" value="{{ $l['jumlah_buku'] }}"></td>
                <td><input type="text" name="keterangan" value="{{ $l['keterangan'] }}"></td>
                <td><button class="btn btn-simpan">💾 Simpan</button></td>
            </form>
        </tr>
        @else
        <tr>
            <td>{{ $l['id'] }}</td>
            <td>{{ $l['laporan'] }}</td>
            <td>{{ $l['jenis_laporan'] }}</td>
            <td>{{ $l['tanggal_laporan'] }}</td>
            <td>{{ $l['jumlah_buku'] }}</td>
            <td>{{ $l['keterangan'] }}</td>
            <td>
                <a href="/admin/laporan?edit={{ $l['id'] }}" class="btn btn-edit">✏️ Edit</a>
                <a href="/admin/laporan/hapus/{{ $l['id'] }}" class="btn btn-hapus" onclick="return confirm('Hapus data ini?')">🗑️ Hapus</a>
            </td>
        </tr>
        @endif
    @endforeach
</table>

</body>
</html>
