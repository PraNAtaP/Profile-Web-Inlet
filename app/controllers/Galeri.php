<?php
class Galeri extends Controller {
    public function __construct() {
        if (!isset($_SESSION['admin_id'])) {
            header('Location: ' . BASEURL . '/admin/login');
            exit;
        }
    }
    public function index() {
        $data['judul'] = 'Kelola Galeri';
        $data['galeri'] = $this->model('Galeri_model')->getAllGaleri();
        $this->view('templates/header_admin', $data);
        $this->view('admin/galeri/index', $data);
        $this->view('templates/footer_admin');
    }
    public function tambah() {
        $data['judul'] = 'Tambah Foto Galeri';
        $this->view('templates/header_admin', $data);
        $this->view('admin/galeri/form', $data);
        $this->view('templates/footer_admin');
    }
    public function simpan() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASEURL . '/galeri');
            exit;
        }
        $namaFileFoto = null;
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            $tmpName = $_FILES['foto']['tmp_name'];
            $namaFile = $_FILES['foto']['name'];
            $ekstensi = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
            $namaFileBaru = uniqid('galeri_') . '.' . $ekstensi;
            $targetDir = __DIR__ . '/../../public/img/galeri/';
            $targetFile = $targetDir . $namaFileBaru;
            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }
            if (move_uploaded_file($tmpName, $targetFile)) {
                $namaFileFoto = $namaFileBaru;
            } else {
                header('Location: ' . BASEURL . '/galeri');
                exit;
            }
        }
        $_POST['foto'] = $namaFileFoto;
        $_POST['tanggal_publikasi'] = date('Y-m-d H:i:s');
        if ($this->model('Galeri_model')->tambahGaleri($_POST) > 0) {
            $this->model('Log_model')->catat('TAMBAH', "Menambah Galeri: " . $_POST['judul']);
            $_SESSION['success'] = 'Data berhasil ditambahkan';
        } else {
            $_SESSION['error'] = 'Gagal menambahkan data';
        }
        header('Location: ' . BASEURL . '/galeri');
        exit;
    }
    public function ubah($id) {
        $data['judul'] = 'Ubah Data Galeri';
        $data['galeri'] = $this->model('Galeri_model')->getGaleriById($id);
        $this->view('templates/header_admin', $data);
        $this->view('admin/galeri/form', $data);
        $this->view('templates/footer_admin');
    }
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASEURL . '/galeri');
            exit;
        }
        $namaFileFoto = $_POST['foto_lama'];
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            $tmpName = $_FILES['foto']['tmp_name'];
            $namaFile = $_FILES['foto']['name'];
            $ekstensi = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
            $namaFileBaru = uniqid('galeri_') . '.' . $ekstensi;
            $targetDir = __DIR__ . '/../../public/img/galeri/';
            $targetFile = $targetDir . $namaFileBaru;
            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }
            if (move_uploaded_file($tmpName, $targetFile)) {
                $namaFileFoto = $namaFileBaru;
                $old_image_path = $targetDir . $_POST['foto_lama'];
                if (!empty($_POST['foto_lama']) && file_exists($old_image_path)) {
                    unlink($old_image_path);
                }
            } else {
                header('Location: ' . BASEURL . '/galeri');
                exit;
            }
        }
        $_POST['foto'] = $namaFileFoto;
        if ($this->model('Galeri_model')->updateGaleri($_POST) > 0) {
            $this->model('Log_model')->catat('UPDATE', "Mengupdate Galeri: " . $_POST['judul']);
            $_SESSION['success'] = 'Data berhasil diupdate';
        } else {
            $_SESSION['error'] = 'Gagal mengupdate data';
        }
        header('Location: ' . BASEURL . '/galeri');
        exit;
    }
    public function hapus($id) {
        $galeri = $this->model('Galeri_model')->getGaleriById($id);
        if ($galeri) {
            if ($this->model('Galeri_model')->hapusGaleri($id) > 0) {
                $this->model('Log_model')->catat('HAPUS', "Menghapus Galeri ID: " . $id);
                $image_path = __DIR__ . '/../../public/img/galeri/' . $galeri['foto'];
                if (!empty($galeri['foto']) && file_exists($image_path)) {
                    unlink($image_path);
                }
                $_SESSION['success'] = 'Data berhasil dihapus';
            } else {
                $_SESSION['error'] = 'Gagal menghapus data';
            }
        } else {
            $_SESSION['error'] = 'Data tidak ditemukan';
        }
        header('Location: ' . BASEURL . '/galeri');
        exit;
    }
}