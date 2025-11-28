<?php

class Berita extends Controller
{
    public function __construct()
    {
        // Pengecekan session login admin
        if (!isset($_SESSION['admin_id'])) {
            // Jika tidak ada session, redirect ke halaman login
            header('Location: ' . BASEURL . '/admin/login');
            exit;
        }
    }

    public function index()
    {
        $data['judul'] = 'Manajemen Berita';
        $data['berita'] = $this->model('Berita_model')->getAllBerita();
        $this->view('templates/header_admin', $data);
        $this->view('admin/berita/index', $data);
        $this->view('templates/footer_admin');
    }

    public function tambah()
    {
        $data['judul'] = 'Tambah Berita';
        $this->view('templates/header_admin', $data);
        $this->view('admin/berita/form', $data);
        $this->view('templates/footer_admin');
    }

    public function simpan()
    {
        // Cek Session dulu
        if (!isset($_SESSION['admin_logged_in'])) {
            header('Location: ' . BASEURL . '/admin/login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // 1. LOGIC UPLOAD GAMBAR
            $nama_gambar_baru = ''; // Default kosong

            // Cek apakah ada file yang diupload & tidak error
            if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === 4) {
                // User tidak upload gambar
                $nama_gambar_baru = '';
            } else {
                // User upload gambar
                $namaFile = $_FILES['gambar']['name'];
                $ukuranFile = $_FILES['gambar']['size'];
                $error = $_FILES['gambar']['error'];
                $tmpName = $_FILES['gambar']['tmp_name'];

                // Cek ekstensi (opsional, tambahin sendiri validasinya kalo mau ketat)
                $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
                $ekstensiGambar = explode('.', $namaFile);
                $ekstensiGambar = strtolower(end($ekstensiGambar));

                // Generate nama baru biar gak bentrok
                $nama_gambar_baru = uniqid() . '.' . $ekstensiGambar;

                // Pindah file ke folder public/img/berita
                move_uploaded_file($tmpName, '../public/img/berita/' . $nama_gambar_baru);
            }

            // 2. KIRIM KE MODEL
            // Masukkan nama gambar ke array $_POST biar dikirim bareng data lain
            $_POST['video_embed'] = $nama_gambar_baru;
            // Ambil ID Admin dari Session
            $_POST['id_admin'] = $_SESSION['admin_id'];

            if ($this->model('Berita_model')->tambahBerita($_POST) > 0) {
                // Sukses
                header('Location: ' . BASEURL . '/berita');
                exit;
            } else {
                // Gagal
                // var_dump("Gagal Insert DB"); die; // Nyalain ini kalo mau debug
                header('Location: ' . BASEURL . '/berita');
                exit;
            }
        }
    }

    private function upload()
    {
        // Periksa apakah ada file yang di-upload dan tidak ada error
        if (!isset($_FILES['gambar']) || $_FILES['gambar']['error'] === UPLOAD_ERR_NO_FILE) {
            return null; // Tidak ada file yang di-upload
        }

        // Periksa error upload lainnya
        if ($_FILES['gambar']['error'] !== UPLOAD_ERR_OK) {
            // Bisa ditambahkan logging atau pesan flash di sini
            return false; // Terjadi error saat upload
        }
        
        $namaFile = $_FILES['gambar']['name'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        // Cek ekstensi file
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            // Ekstensi tidak valid
            return false;
        }

        // Generate nama file baru yang unik
        $namaFileBaru = uniqid('brt_', true) . '.' . $ekstensiGambar;

        // Path tujuan upload
        $pathTujuan = 'public/img/berita/' . $namaFileBaru;

        // Pindahkan file
        if (move_uploaded_file($tmpName, $pathTujuan)) {
            return $namaFileBaru;
        } else {
            // Gagal memindahkan file
            return false;
        }
    }


    public function edit($id)
    {
        $data['judul'] = 'Edit Berita';
        $data['berita'] = $this->model('Berita_model')->getBeritaById($id);
        $this->view('templates/header_admin', $data);
        $this->view('admin/berita/form', $data);
        $this->view('templates/footer_admin');
    }

    public function update()
    {
        $gambar = $this->upload(); // Bisa mengembalikan nama file, null, atau false

        if ($gambar === false) {
            // Terjadi error saat upload (misal: tipe file salah)
            // Redirect kembali dengan pesan error
            header('Location: ' . BASEURL . '/berita/edit/' . $_POST['id_berita']);
            exit;
        }

        $data = $_POST;

        if ($gambar === null) {
            // Tidak ada file baru yang di-upload, gunakan gambar lama
            $data['video_embed'] = $_POST['gambar_lama'];
        } else {
            // Ada file baru yang di-upload, gunakan nama file baru
            $data['video_embed'] = $gambar;
            
            // Hapus gambar lama jika ada dan bukan gambar default
            if (!empty($_POST['gambar_lama']) && $_POST['gambar_lama'] != 'default.png') {
                $pathGambarLama = 'public/img/berita/' . $_POST['gambar_lama'];
                if (file_exists($pathGambarLama)) {
                    unlink($pathGambarLama);
                }
            }
        }

        if ($this->model('Berita_model')->updateBerita($data) > 0) {
            header('Location: ' . BASEURL . '/berita');
            exit;
        } else {
            // Redirect kembali, bahkan jika tidak ada baris yang terpengaruh (tidak ada perubahan data)
            header('Location: ' . BASEURL . '/berita');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('Berita_model')->hapusBerita($id) > 0) {
            header('Location: ' . BASEURL . '/berita');
            exit;
        } else {
            // Idealnya ada notifikasi error
            header('Location: ' . BASEURL . '/berita');
            exit;
        }
    }
}
