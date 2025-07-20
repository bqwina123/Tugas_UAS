<!DOCTYPE html>
<html>
<head>
    <title>📚 Peminjaman Buku</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f5f7fa; padding: 40px; }
        h2 { text-align: center; color: #333; }

        .btn {
            padding: 6px 14px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            margin: 2px;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn:hover { transform: scale(1.03); }

        .btn-tambah { background: #28a745; color: white; }
        .btn-edit { background: #ffc107; color: black; }
        .btn-simpan { background: #17a2b8; color: white; }
        .btn-hapus { background: #dc3545; color: white; }
        .btn-back { background: #007bff; color: white; float: right; margin-bottom: 20px; }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }

        th, td {
            border: 1px solid #ccc;
            padding: 12px 10px;
            text-align: center;
        }

        th { background: #007bff; color: white; }

        input[type="text"], input[type="date"], select {
            padding: 5px;
            width: 130px;
        }

        .form-box {
            background: white;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>

<h2>📖 Manajemen Peminjaman Buku</h2>
<a href="/dashboard" class="btn btn-back">🔙 Kembali ke Dashboard</a>

<form class="form-box" method="POST" action="/admin/peminjaman/tambah">
    @csrf
    <input type="text" name="nama_buku" placeholder="Nama Buku" required>
    <input type="text" name="nama_peminjam" placeholder="Nama Peminjam" required>
    <input type="date" name="tanggal_pinjam" required>
    <input type="date" name="tanggal_kembali" required>
    <select name="status">
        <option value="Dipinjam">Dipinjam</option>
        <option value="Dikembalikan">Dikembalikan</option>
    </select>
    <button type="submit" class="btn btn-tambah">➕ Tambah</button>
</form>

<table>
    <tr>
        <th>ID</th>
        <th>Nama Buku</th>
        <th>Nama Peminjam</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    @foreach($peminjaman as $p)
        @if(isset($edit_id) && $edit_id == $p['id'])
        <tr>
            <form method="POST" action="/admin/peminjaman/update">
                @csrf
                <td>{{ $p['id'] }}<input type="hidden" name="id" value="{{ $p['id'] }}"></td>
                <td><input type="text" name="nama_buku" value="{{ $p['nama_buku'] }}"></td>
                <td><input type="text" name="nama_peminjam" value="{{ $p['nama_peminjam'] }}"></td>
                <td><input type="date" name="tanggal_pinjam" value="{{ $p['tanggal_pinjam'] }}"></td>
                <td><input type="date" name="tanggal_kembali" value="{{ $p['tanggal_kembali'] }}"></td>
                <td>
                    <select name="status">
                        <option value="Dipinjam" {{ $p['status'] == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                        <option value="Dikembalikan" {{ $p['status'] == 'Dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                    </select>
                </td>
                <td><button class="btn btn-simpan">💾 Simpan</button></td>
            </form>
        </tr>
        @else
        <tr>
            <td>{{ $p['id'] ?? '-' }}</td>
            <td>{{ $p['nama_buku'] ?? '❌' }}</td>
            <td>{{ $p['nama_peminjam'] ?? '-' }}</td>
            <td>{{ $p['tanggal_pinjam'] ?? '-' }}</td>
            <td>{{ $p['tanggal_kembali'] ?? '-' }}</td>
            <td>{{ $p['status'] ?? '-' }}</td>
            <td>
                <a href="/admin/peminjaman?edit={{ $p['id'] }}" class="btn btn-edit">✏️ Edit</a>
                <a href="/admin/peminjaman/hapus/{{ $p['id'] }}" class="btn btn-hapus" onclick="return confirm('Hapus data ini?')">🗑️ Hapus</a>
            </td>
        </tr>
        @endif
    @endforeach
</table>

</body>
</html>
