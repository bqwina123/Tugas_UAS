<!DOCTYPE html>
<html>
<head>
    <title>Manajemen Buku</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f8; padding: 40px; }
        h2 { text-align: center; }

        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
            margin: 2px;
        }

        .btn-tambah { background: #28a745; color: white; }
        .btn-edit   { background: #ffc107; color: black; }
        .btn-simpan { background: #17a2b8; color: white; }
        .btn-hapus  { background: #dc3545; color: white; }
        .btn-back   { background: #007bff; color: white; float: right; }

        form.tambah {
            background: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 0 5px rgba(0,0,0,0.05);
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background: #007bff;
            color: white;
        }

        input[type="text"], input[type="number"], select {
            width: 120px;
            padding: 5px;
        }
    </style>
</head>
<body>

    <h2>📚 Manajemen Buku</h2>

    <a href="/dashboard" class="btn btn-back">🔙 Kembali ke Dashboard</a>

    <!-- Form Tambah Buku -->
    <form class="tambah" method="POST" action="/admin/buku/tambah">
        @csrf
        <input type="text" name="judul" placeholder="Judul Buku" required>
        <input type="text" name="penulis" placeholder="Penulis" required>
        <input type="text" name="penerbit" placeholder="Penerbit" required>
        <input type="number" name="tahun" placeholder="Tahun Terbit" required>
        <input type="text" name="kategori" placeholder="Kategori" required>
        <select name="status">
            <option value="Tersedia">Tersedia</option>
            <option value="Dipinjam">Dipinjam</option>
        </select>
        <button class="btn btn-tambah" type="submit">➕ Tambah Buku</button>
    </form>

    <!-- Tabel Buku -->
    <table>
        <tr>
            <th>ID</th><th>Judul</th><th>Penulis</th><th>Penerbit</th><th>Tahun</th><th>Kategori</th><th>Status</th><th>Aksi</th>
        </tr>
        @foreach($buku as $b)
            @if(isset($edit_id) && $edit_id == $b['id'])
            <tr>
                <form method="POST" action="/admin/buku/update">
                    @csrf
                    <td>{{ $b['id'] }}<input type="hidden" name="id" value="{{ $b['id'] }}"></td>
                    <td><input type="text" name="judul" value="{{ $b['judul'] }}"></td>
                    <td><input type="text" name="penulis" value="{{ $b['penulis'] }}"></td>
                    <td><input type="text" name="penerbit" value="{{ $b['penerbit'] }}"></td>
                    <td><input type="number" name="tahun" value="{{ $b['tahun'] }}"></td>
                    <td><input type="text" name="kategori" value="{{ $b['kategori'] }}"></td>
                    <td>
                        <select name="status">
                            <option {{ $b['status'] == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                            <option {{ $b['status'] == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                        </select>
                    </td>
                    <td><button type="submit" class="btn btn-simpan">💾 Simpan</button></td>
                </form>
            </tr>
            @else
            <tr>
                <td>{{ $b['id'] }}</td>
                <td>{{ $b['judul'] }}</td>
                <td>{{ $b['penulis'] }}</td>
                <td>{{ $b['penerbit'] }}</td>
                <td>{{ $b['tahun'] }}</td>
                <td>{{ $b['kategori'] }}</td>
                <td>{{ $b['status'] }}</td>
                <td>
                    <a href="{{ url('/admin/buku?edit=' . $b['id']) }}" class="btn btn-edit">✏️ Edit</a>
                    <a href="/admin/buku/hapus/{{ $b['id'] }}" class="btn btn-hapus" onclick="return confirm('Yakin ingin menghapus buku ini?')">🗑️ Hapus</a>
                </td>
            </tr>
            @endif
        @endforeach
    </table>

</body>
</html>
