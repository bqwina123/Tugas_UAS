<!DOCTYPE html>
<html>
<head>
    <title>👤 Manajemen Pengguna</title>
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

        input[type="text"], input[type="date"], input[type="email"] {
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

<h2>👥 Manajemen Pengguna</h2>
<a href="/dashboard" class="btn btn-back">🔙 Kembali ke Dashboard</a>

<form class="form-box" method="POST" action="/admin/pengguna/tambah">
    @csrf
    <input type="text" name="nama" placeholder="Nama" required>
    <input type="text" name="alamat" placeholder="Alamat" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="no_hp" placeholder="No HP" required>
    <input type="date" name="tanggal_registrasi" required>
    <button class="btn btn-tambah">➕ Tambah</button>
</form>

<table>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Email</th>
        <th>No HP</th>
        <th>Tanggal Registrasi</th>
        <th>Aksi</th>
    </tr>

    @foreach($pengguna as $p)
        @if(isset($edit_id) && $edit_id == $p['id_pengguna'])
        <tr>
            <form method="POST" action="/admin/pengguna/update">
                @csrf
                <td>{{ $p['id_pengguna'] }}<input type="hidden" name="id_pengguna" value="{{ $p['id_pengguna'] }}"></td>
                <td><input type="text" name="nama" value="{{ $p['nama'] }}"></td>
                <td><input type="text" name="alamat" value="{{ $p['alamat'] }}"></td>
                <td><input type="email" name="email" value="{{ $p['email'] }}"></td>
                <td><input type="text" name="no_hp" value="{{ $p['no_hp'] }}"></td>
                <td><input type="date" name="tanggal_registrasi" value="{{ $p['tanggal_registrasi'] }}"></td>
                <td><button class="btn btn-simpan">💾 Simpan</button></td>
            </form>
        </tr>
        @else
        <tr>
            <td>{{ $p['id_pengguna'] }}</td>
            <td>{{ $p['nama'] }}</td>
            <td>{{ $p['alamat'] }}</td>
            <td>{{ $p['email'] }}</td>
            <td>{{ $p['no_hp'] }}</td>
            <td>{{ $p['tanggal_registrasi'] }}</td>
            <td>
                <a href="/admin/pengguna?edit={{ $p['id_pengguna'] }}" class="btn btn-edit">✏️ Edit</a>
                <a href="/admin/pengguna/hapus/{{ $p['id_pengguna'] }}" class="btn btn-hapus" onclick="return confirm('Yakin hapus data ini?')">🗑️ Hapus</a>
            </td>
        </tr>
        @endif
    @endforeach
</table>

</body>
</html>
