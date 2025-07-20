<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

session_start();

// Dummy user untuk login
$users = [
    ['username' => 'admin', 'password' => 'admin123', 'role' => 'admin'],
    ['username' => 'user', 'password' => 'user123', 'role' => 'user'],
];

// Halaman login
Route::get('/', function () {
    return view('login');
})->name('login');

// Proses login
Route::post('/login', function (Request $request) use ($users) {
    foreach ($users as $user) {
        if ($user['username'] === $request->username && $user['password'] === $request->password) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            return redirect('/dashboard');
        }
    }
    return back()->with('error', 'Username atau Password salah!');
});

// Halaman dashboard
Route::get('/dashboard', function () {
    if (!isset($_SESSION['role'])) return redirect('/');
    return view('dashboard.' . $_SESSION['role']);
});

// Logout
Route::get('/logout', function () {
    session_destroy();
    return redirect('/');
})->name('logout');

// Halaman register
Route::get('/register', function () {
    return view('register');
})->name('register');

// Proses register (sementara hanya menampilkan input yang dimasukkan)
Route::post('/register', function (Illuminate\Http\Request $request) {
    // Validasi sederhana
    if ($request->password !== $request->password_confirmation) {
        return back()->with('error', 'Password tidak cocok!');
    }

    // Simpan ke session (simulasi, tidak permanen)
    $_SESSION['registered'] = [
        'nama' => $request->nama,
        'username' => $request->username,
        'password' => $request->password,
    ];

    return redirect('/')->with('success', 'Pendaftaran berhasil! Silakan login.');
});

Route::get('/admin/buku', function () {
    return view('admin.buku'); // Buat file ini untuk CRUD buku
});

Route::get('/admin/peminjaman', function () {
    return view('admin.peminjaman'); // Buat file ini untuk CRUD peminjaman
});

Route::get('/admin/pengguna', function () {
    return view('admin.pengguna'); // Buat file ini untuk manajemen pengguna
});

Route::get('/admin/laporan', function () {
    return view('admin.laporan'); // Buat file ini untuk laporan aktivitas
});

// Dashboard User
Route::get('/dashboard', function () {
    if (!isset($_SESSION['role'])) return redirect('/');
    return view('dashboard.' . $_SESSION['role']);
});

// CRUD Aplikasi User
Route::get('/user/cari', function () {
    return view('user.cari'); // form pencarian
});

Route::get('/user/pinjam', function () {
    return view('user.pinjam'); // form pinjam buku
});

Route::get('/user/riwayat', function () {
    return view('user.riwayat'); // tampilkan daftar riwayat pinjam
});

Route::get('/user/detail', function () {
    return view('user.detail'); // detail buku
});


// Dummy data awal
if (!isset($_SESSION['buku'])) {
    $_SESSION['buku'] = [
        ['id' => 1, 'judul' => 'Laravel Dasar', 'penulis' => 'Andre Hirata', 'penerbit' => 'Informatika', 'tahun' => 2025, 'kategori' => 'Pemograman', 'status' => 'Tersedia'],
        ['id' => 2, 'judul' => 'PHP Lanjut', 'penulis' => 'Tari Liya', 'penerbit' => 'Informatika', 'tahun' => 2024, 'kategori' => 'Pemograman', 'status' => 'Tersedia'],
        ['id' => 3, 'judul' => 'Desain UI/UX', 'penulis' => 'Ahmad Fauzi', 'penerbit' => 'SOS SIstem', 'tahun' => 2019, 'kategori' => 'Desain', 'status' => 'Tersedia'],
        ['id' => 4, 'judul' => 'Basis Data', 'penulis' => 'Henry Munawuru', 'penerbit' => 'Informatika', 'tahun' => 2024, 'kategori' => 'Database', 'status' => 'Dipinjam'],
        ['id' => 5, 'judul' => 'HTML & CSS', 'penulis' => 'Pida Bayu', 'penerbit' => 'Websiteku', 'tahun' => 2024, 'kategori' => 'Web', 'status' => 'Tersedia'],
    ];
}

// Menampilkan halaman buku dan menangani mode edit
Route::get('/admin/buku', function (Request $request) {
    $edit_id = $request->query('edit'); // Tangkap ?edit=ID dari URL
    return view('admin.buku', [
        'buku' => $_SESSION['buku'],
        'edit_id' => $edit_id
    ]);
});

// Menambahkan buku baru
Route::post('/admin/buku/tambah', function (Request $request) {
    $new = [
        'id' => count($_SESSION['buku']) + 1,
        'judul' => $request->judul,
        'penulis' => $request->penulis,
        'penerbit' => $request->penerbit,
        'tahun' => $request->tahun,
        'kategori' => $request->kategori,
        'status' => $request->status,
    ];
    $_SESSION['buku'][] = $new;
    return redirect('/admin/buku');
});

// Menyimpan hasil edit
Route::post('/admin/buku/update', function (Request $request) {
    foreach ($_SESSION['buku'] as &$b) {
        if ($b['id'] == $request->id) {
            $b['judul'] = $request->judul;
            $b['penulis'] = $request->penulis;
            $b['penerbit'] = $request->penerbit;
            $b['tahun'] = $request->tahun;
            $b['kategori'] = $request->kategori;
            $b['status'] = $request->status;
        }
    }
    return redirect('/admin/buku');
});

// Menghapus buku
Route::get('/admin/buku/hapus/{id}', function ($id) {
    $_SESSION['buku'] = array_values(array_filter($_SESSION['buku'], fn($b) => $b['id'] != $id));
    return redirect('/admin/buku');
});


// Dummy data awal
if (!isset($_SESSION['peminjaman'])) {
    $_SESSION['peminjaman'] = [
        ['id' => 1, 'nama_buku' => 'Laravel Dasar', 'nama_peminjam' => 'Andi', 'tanggal_pinjam' => '2024-07-01', 'tanggal_kembali' => '2024-07-10', 'status' => 'Dipinjam'],
        ['id' => 2, 'nama_buku' => 'PHP Lanjut', 'nama_peminjam' => 'Budi', 'tanggal_pinjam' => '2024-07-02', 'tanggal_kembali' => '2024-07-12', 'status' => 'Dikembalikan'],
        ['id' => 3, 'nama_buku' => 'HTML & CSS', 'nama_peminjam' => 'Citra', 'tanggal_pinjam' => '2024-07-03', 'tanggal_kembali' => '2024-07-13', 'status' => 'Dipinjam'],
        ['id' => 4, 'nama_buku' => 'JS Dasar', 'nama_peminjam' => 'Deni', 'tanggal_pinjam' => '2024-07-04', 'tanggal_kembali' => '2024-07-14', 'status' => 'Dipinjam'],
        ['id' => 5, 'nama_buku' => 'MySQL Praktis', 'nama_peminjam' => 'Eka', 'tanggal_pinjam' => '2024-07-05', 'tanggal_kembali' => '2024-07-15', 'status' => 'Dikembalikan'],
    ];
}

// TAMPIL
Route::get('/admin/peminjaman', function (Request $request) {
    return view('admin.peminjaman', [
        'peminjaman' => $_SESSION['peminjaman'],
        'edit_id' => $request->query('edit')
    ]);
});

// TAMBAH
Route::post('/admin/peminjaman/tambah', function (Request $request) {
    $_SESSION['peminjaman'][] = [
        'id' => count($_SESSION['peminjaman']) + 1,
        'nama_buku' => $request->nama_buku,
        'nama_peminjam' => $request->nama_peminjam,
        'tanggal_pinjam' => $request->tanggal_pinjam,
        'tanggal_kembali' => $request->tanggal_kembali,
        'status' => $request->status,
    ];
    return redirect('/admin/peminjaman');
});

// UPDATE
Route::post('/admin/peminjaman/update', function (Request $request) {
    foreach ($_SESSION['peminjaman'] as &$p) {
        if ($p['id'] == $request->id) {
            $p['nama_buku'] = $request->nama_buku;
            $p['nama_peminjam'] = $request->nama_peminjam;
            $p['tanggal_pinjam'] = $request->tanggal_pinjam;
            $p['tanggal_kembali'] = $request->tanggal_kembali;
            $p['status'] = $request->status;
        }
    }
    return redirect('/admin/peminjaman');
});

// HAPUS
Route::get('/admin/peminjaman/hapus/{id}', function ($id) {
    $_SESSION['peminjaman'] = array_values(array_filter($_SESSION['peminjaman'], fn($p) => $p['id'] != $id));
    return redirect('/admin/peminjaman');
});

if (!isset($_SESSION['pengguna'])) {
    $_SESSION['pengguna'] = [
        ['id_pengguna' => 1, 'nama' => 'Andi', 'alamat' => 'Lombok', 'email' => 'andi@mail.com', 'no_hp' => '081234567890', 'tanggal_registrasi' => '2024-07-01'],
        ['id_pengguna' => 2, 'nama' => 'Budi', 'alamat' => 'Mataram', 'email' => 'budi@mail.com', 'no_hp' => '081234567891', 'tanggal_registrasi' => '2024-07-02'],
        ['id_pengguna' => 3, 'nama' => 'Citra', 'alamat' => 'Praya', 'email' => 'citra@mail.com', 'no_hp' => '081234567892', 'tanggal_registrasi' => '2024-07-03'],
        ['id_pengguna' => 4, 'nama' => 'Dedi', 'alamat' => 'Sumbawa', 'email' => 'dedi@mail.com', 'no_hp' => '081234567893', 'tanggal_registrasi' => '2024-07-04'],
        ['id_pengguna' => 5, 'nama' => 'Eka', 'alamat' => 'Bima', 'email' => 'eka@mail.com', 'no_hp' => '081234567894', 'tanggal_registrasi' => '2024-07-05'],
    ];
}

Route::get('/admin/pengguna', function (Request $request) {
    return view('admin.pengguna', [
        'pengguna' => $_SESSION['pengguna'],
        'edit_id' => $request->query('edit')
    ]);
});

Route::post('/admin/pengguna/tambah', function (Request $request) {
    $_SESSION['pengguna'][] = [
        'id_pengguna' => count($_SESSION['pengguna']) + 1,
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'email' => $request->email,
        'no_hp' => $request->no_hp,
        'tanggal_registrasi' => $request->tanggal_registrasi,
    ];
    return redirect('/admin/pengguna');
});

Route::post('/admin/pengguna/update', function (Request $request) {
    foreach ($_SESSION['pengguna'] as &$p) {
        if ($p['id_pengguna'] == $request->id_pengguna) {
            $p['nama'] = $request->nama;
            $p['alamat'] = $request->alamat;
            $p['email'] = $request->email;
            $p['no_hp'] = $request->no_hp;
            $p['tanggal_registrasi'] = $request->tanggal_registrasi;
        }
    }
    return redirect('/admin/pengguna');
});

Route::get('/admin/pengguna/hapus/{id}', function ($id) {
    $_SESSION['pengguna'] = array_values(array_filter($_SESSION['pengguna'], fn($p) => $p['id_pengguna'] != $id));
    return redirect('/admin/pengguna');
});

if (!isset($_SESSION['laporan'])) {
    $_SESSION['laporan'] = [
        ['id' => 1, 'laporan' => 'Peminjaman Mingguan', 'jenis_laporan' => 'Peminjaman', 'tanggal_laporan' => '2024-07-01', 'jumlah_buku' => 30, 'keterangan' => 'Laporan pinjam minggu ini'],
        ['id' => 2, 'laporan' => 'Pengembalian Juli', 'jenis_laporan' => 'Pengembalian', 'tanggal_laporan' => '2024-07-05', 'jumlah_buku' => 25, 'keterangan' => 'Buku kembali bulan Juli'],
        ['id' => 3, 'laporan' => 'Buku Hilang', 'jenis_laporan' => 'Kehilangan', 'tanggal_laporan' => '2024-07-08', 'jumlah_buku' => 2, 'keterangan' => 'Hilang karena bencana'],
        ['id' => 4, 'laporan' => 'Donasi Buku', 'jenis_laporan' => 'Donasi', 'tanggal_laporan' => '2024-07-10', 'jumlah_buku' => 10, 'keterangan' => 'Donasi dari alumni'],
        ['id' => 5, 'laporan' => 'Inventaris Semester 1', 'jenis_laporan' => 'Inventaris', 'tanggal_laporan' => '2024-07-15', 'jumlah_buku' => 100, 'keterangan' => 'Laporan total buku semester ini'],
    ];
}

Route::get('/admin/laporan', function (Request $request) {
    return view('admin.laporan', [
        'laporan' => $_SESSION['laporan'],
        'edit_id' => $request->query('edit')
    ]);
});

Route::post('/admin/laporan/tambah', function (Request $request) {
    $_SESSION['laporan'][] = [
        'id' => count($_SESSION['laporan']) + 1,
        'laporan' => $request->laporan,
        'jenis_laporan' => $request->jenis_laporan,
        'tanggal_laporan' => $request->tanggal_laporan,
        'jumlah_buku' => $request->jumlah_buku,
        'keterangan' => $request->keterangan,
    ];
    return redirect('/admin/laporan');
});

Route::post('/admin/laporan/update', function (Request $request) {
    foreach ($_SESSION['laporan'] as &$l) {
        if ($l['id'] == $request->id) {
            $l['laporan'] = $request->laporan;
            $l['jenis_laporan'] = $request->jenis_laporan;
            $l['tanggal_laporan'] = $request->tanggal_laporan;
            $l['jumlah_buku'] = $request->jumlah_buku;
            $l['keterangan'] = $request->keterangan;
        }
    }
    return redirect('/admin/laporan');
});

Route::get('/admin/laporan/hapus/{id}', function ($id) {
    $_SESSION['laporan'] = array_values(array_filter($_SESSION['laporan'], fn($l) => $l['id'] != $id));
    return redirect('/admin/laporan');
});

