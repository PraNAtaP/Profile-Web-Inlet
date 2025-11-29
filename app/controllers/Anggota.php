<?php

class Anggota extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
            header('Location: ' . BASEURL . '/admin/login');
            exit;
        }
    }

    public function index()
    {
        $data['judul'] = 'Manajemen Anggota Lab';
        $data['anggota'] = $this->model('Anggota_model')->getAllAnggota();
        $this->view('templates/header_admin', $data);
        $this->view('admin/anggota/index', $data);
        $this->view('templates/footer_admin');
    }

    public function tambah()
    {
        $data['judul'] = 'Tambah Anggota Lab';
        $this->view('templates/header_admin', $data);
        $this->view('admin/anggota/form', $data);
        $this->view('templates/footer_admin');
    }

    public function simpan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nama_foto_baru = $this->uploadFoto();
            
            if ($nama_foto_baru === false) {
                // Ada error saat upload
                // (opsional) tambahkan flash message di sini
                header('Location: ' . BASEURL . '/anggota/tambah');
                exit;
            }

            $data = $_POST;
            $data['foto'] = $nama_foto_baru;
            $data['id_admin'] = $_SESSION['admin_id'];

            if ($this->model('Anggota_model')->tambahAnggota($data) > 0) {
                header('Location: ' . BASEURL . '/anggota');
                exit;
            } else {
                // (opsional) tambahkan flash message kegagalan
                header('Location: ' . BASEURL . '/anggota');
                exit;
            }
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Edit Anggota Lab';
        $data['anggota'] = $this->model('Anggota_model')->getAnggotaById($id);
        $this->view('templates/header_admin', $data);
        $this->view('admin/anggota/form', $data);
        $this->view('templates/footer_admin');
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nama_foto_baru = $this->uploadFoto();

            if ($nama_foto_baru === false) {
                // Error upload, redirect kembali
                header('Location: ' . BASEURL . '/anggota/edit/' . $_POST['id_anggota']);
                exit;
            }
            
            $data = $_POST;

            if ($nama_foto_baru === null) {
                // Tidak ada foto baru, pakai yang lama
                $data['foto'] = $_POST['foto_lama'];
            } else {
                // Ada foto baru, hapus foto lama jika ada
                $data['foto'] = $nama_foto_baru;
                if (!empty($_POST['foto_lama'])) {
                    $pathFotoLama = 'img/anggota/' . $_POST['foto_lama'];
                    if (file_exists($pathFotoLama)) {
                        unlink($pathFotoLama);
                    }
                }
            }

            if ($this->model('Anggota_model')->updateAnggota($data) >= 0) { // >= 0 untuk handle jika tidak ada perubahan
                header('Location: ' . BASEURL . '/anggota');
                exit;
            } else {
                header('Location: ' . BASEURL . '/anggota/edit/' . $_POST['id_anggota']);
                exit;
            }
        }
    }

    public function hapus($id)
    {
        if ($this->model('Anggota_model')->hapusAnggota($id) > 0) {
            header('Location: ' . BASEURL . '/anggota');
            exit;
        } else {
            header('Location: ' . BASEURL . '/anggota');
            exit;
        }
    }

    private function uploadFoto()
    {
        if (!isset($_FILES['foto']) || $_FILES['foto']['error'] === UPLOAD_ERR_NO_FILE) {
            return null; // Tidak ada file diupload, ini bukan error
        }

        if ($_FILES['foto']['error'] !== UPLOAD_ERR_OK) {
            return false; // Error saat upload
        }

        $namaFile = $_FILES['foto']['name'];
        $tmpName = $_FILES['foto']['tmp_name'];
        $ukuranFile = $_FILES['foto']['size'];

        // Validasi ekstensi
        $ekstensiValid = ['jpg', 'jpeg', 'png'];
        $ekstensiFile = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
        if (!in_array($ekstensiFile, $ekstensiValid)) {
            return false; // Ekstensi tidak diizinkan
        }

        // Validasi ukuran (misal: maks 2MB)
        if ($ukuranFile > 2000000) {
            return false; // File terlalu besar
        }
        
        // Buat folder jika belum ada
        $uploadDir = 'img/anggota/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Generate nama file unik
        $namaFileBaru = uniqid('anggota_') . '.' . $ekstensiFile;
        
        // Pindahkan file
        if (move_uploaded_file($tmpName, $uploadDir . $namaFileBaru)) {
            return $namaFileBaru;
        } else {
            return false; // Gagal memindahkan file
        }
    }
}
