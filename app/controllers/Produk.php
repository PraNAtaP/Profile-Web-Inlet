<?php

class Produk extends Controller
{

    public function __construct()
    {
        // Cek Login Session
        if (!isset($_SESSION['admin_id'])) {
            header('Location: ' . BASEURL . '/admin/login');
            exit;
        }
    }

    public function index()
    {
        $data['judul'] = 'Produk Lab';
        // Pastikan nama method di Model adalah getAllProduk()
        $data['produk'] = $this->model('Produk_model')->getAllProduk();

        $this->view('templates/header_admin', $data);
        $this->view('admin/produk/index', $data);
        $this->view('templates/footer_admin');
    }

    // Method untuk menampilkan form tambah
    public function tambah()
    {
        $data['judul'] = 'Tambah Produk';
        $this->view('templates/header_admin', $data);
        $this->view('admin/produk/form', $data); // Load view form yang sama
        $this->view('templates/footer_admin');
    }

    public function edit($id)
    {
        $data['judul'] = 'Edit Produk';
        // Pastikan nama method di Model adalah getProdukById()
        $data['produk'] = $this->model('Produk_model')->getProdukById($id);

        if ($data['produk'] == false) {
            header('Location: ' . BASEURL . '/produk');
            exit;
        }

        $this->view('templates/header_admin', $data);
        $this->view('admin/produk/form', $data);
        $this->view('templates/footer_admin');
    }

    public function simpan()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASEURL . '/produk');
            exit;
        }

        // 1. SETUP LOGIC UPLOAD
        $namaFileGambar = ''; // Default kosong

        // Cek ada file yang diupload gak?
        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
            $namaAsli = $_FILES['gambar']['name'];
            $tmpName  = $_FILES['gambar']['tmp_name'];
            $ekstensi = strtolower(pathinfo($namaAsli, PATHINFO_EXTENSION));
            $allowed  = ['jpg', 'jpeg', 'png', 'webp'];

            // Validasi Ekstensi
            if (in_array($ekstensi, $allowed)) {
                $namaFileBaru = uniqid('produk_') . '.' . $ekstensi;

                // PATH ABSOLUT (SOLUSI BIAR GAK NYASAR)
                // Mundur 2 langkah dari Controller -> App -> Root -> public -> img -> produk
                $targetDir = __DIR__ . '/../../public/img/produk/';
                $targetFile = $targetDir . $namaFileBaru;

                // Buat folder jika belum ada
                if (!file_exists($targetDir)) {
                    mkdir($targetDir, 0755, true);
                }

                if (move_uploaded_file($tmpName, $targetFile)) {
                    $namaFileGambar = $namaFileBaru;
                }
            }
        }

        // 2. PREPARE DATA UNTUK MODEL
        // Masukkan nama gambar ke $_POST biar model tinggal olah array $_POST
        $_POST['gambar'] = $namaFileGambar;

        // Ambil ID Admin dari session
        $_POST['id_admin'] = $_SESSION['admin_id'] ?? 1;

        // Panggil Model (Parameter cukup $_POST saja)
        if ($this->model('Produk_model')->tambahProduk($_POST) > 0) {
            $this->model('Log_model')->catat('TAMBAH', "Menambah Produk: " . $_POST['judul']);
            header('Location: ' . BASEURL . '/produk');
            exit;
        } else {
            // Kalau gagal insert db
            header('Location: ' . BASEURL . '/produk');
            exit;
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASEURL . '/produk');
            exit;
        }

        // 1. SETUP LOGIC UPLOAD
        // Default: Pakai gambar lama dulu
        $namaFileGambar = $_POST['gambar_lama'];

        // Cek apakah user upload gambar BARU?
        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
            $namaAsli = $_FILES['gambar']['name'];
            $tmpName  = $_FILES['gambar']['tmp_name'];
            $ekstensi = strtolower(pathinfo($namaAsli, PATHINFO_EXTENSION));
            $allowed  = ['jpg', 'jpeg', 'png', 'webp'];

            if (in_array($ekstensi, $allowed)) {
                $namaFileBaru = uniqid('produk_') . '.' . $ekstensi;

                // PATH ABSOLUT
                $targetDir = __DIR__ . '/../../public/img/produk/';
                $targetFile = $targetDir . $namaFileBaru;

                if (!file_exists($targetDir)) {
                    mkdir($targetDir, 0755, true);
                }

                if (move_uploaded_file($tmpName, $targetFile)) {
                    $namaFileGambar = $namaFileBaru;

                    // (Opsional) Hapus file lama biar hemat storage
                    $pathLama = $targetDir . $_POST['gambar_lama'];
                    if (!empty($_POST['gambar_lama']) && file_exists($pathLama)) {
                        unlink($pathLama);
                    }
                }
            }
        }

        // 2. PREPARE DATA
        $_POST['gambar'] = $namaFileGambar;

        if ($this->model('Produk_model')->updateProduk($_POST) > 0) {
            $this->model('Log_model')->catat('UPDATE', "Mengupdate Produk: " . $_POST['judul']);
            header('Location: ' . BASEURL . '/produk');
            exit;
        } else {
            header('Location: ' . BASEURL . '/produk');
            exit;
        }
    }

    public function hapus($id)
    {
        // (Opsional) Disini bisa ditambah logic unlink gambar sebelum hapus DB
        if ($this->model('Produk_model')->hapusProduk($id) > 0) {
            $this->model('Log_model')->catat('HAPUS', "Menghapus Produk ID: " . $id);
            header('Location: ' . BASEURL . '/produk');
            exit;
        } else {
            header('Location: ' . BASEURL . '/produk');
            exit;
        }
    }
}
