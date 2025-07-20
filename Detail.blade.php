<!DOCTYPE html>
<html>
<head>
    <title>📘 Detail Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f4f7;
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
            box-shadow: 0 0 10px rgba(0,0,0,0.08);
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            vertical-align: top;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>

<h2>📘 Detail Buku</h2>
<a href="/dashboard" class="btn btn-back">🔙 Kembali ke Dashboard</a>

@php
    $buku = [
        [
            'id_buku' => 1,
            'judul' => 'Laravel Dasar',
            'penulis' => 'Andi',
            'penerbit' => 'Informatika',
            'tahun' => '2021',
            'kategori' => 'Pemrograman',
            'deskripsi' => 'Panduan dasar framework Laravel untuk pemula.',
            'isbn' => '9786020321',
        ],
        [
            'id_buku' => 2,
            'judul' => 'PHP Lanjut',
            'penulis' => 'Budi',
            'penerbit' => 'Informatika',
            'tahun' => '2022',
            'kategori' => 'Pemrograman',
            'deskripsi' => 'Membahas teknik lanjutan dalam PHP.',
            'isbn' => '9786020322',
        ],
        [
            'id_buku' => 3,
            'judul' => 'Desain UI/UX',
            'penulis' => 'Citra',
            'penerbit' => 'Komputer',
            'tahun' => '2020',
            'kategori' => 'Desain',
            'deskripsi' => 'Konsep dan prinsip desain antarmuka.',
            'isbn' => '9786020323',
        ],
        [
            'id_buku' => 4,
            'judul' => 'Basis Data',
            'penulis' => 'Dedi',
            'penerbit' => 'Analisis Data',
            'tahun' => '2021',
            'kategori' => 'Database',
            'deskripsi' => 'Dasar-dasar sistem manajemen basis data.',
            'isbn' => '9786020324',
        ],
        [
            'id_buku' => 5,
            'judul' => 'HTML & CSS',
            'penulis' => 'Eka',
            'penerbit' => 'Websiteku',
            'tahun' => '2019',
            'kategori' => 'Web',
            'deskripsi' => 'Belajar membuat website dengan HTML dan CSS.',
            'isbn' => '9786020325',
        ],
    ];
@endphp

<table>
    <thead>
        <tr>
            <th>ID Buku</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Kategori</th>
            <th>Deskripsi</th>
            <th>ISBN</th>
        </tr>
    </thead>
    <tbody>
        @foreach($buku as $b)
        <tr>
            <td>{{ $b['id_buku'] }}</td>
            <td>{{ $b['judul'] }}</td>
            <td>{{ $b['penulis'] }}</td>
            <td>{{ $b['penerbit'] }}</td>
            <td>{{ $b['tahun'] }}</td>
            <td>{{ $b['kategori'] }}</td>
            <td>{{ $b['deskripsi'] }}</td>
            <td>{{ $b['isbn'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
