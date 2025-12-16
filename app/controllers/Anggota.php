<?php
class Anggota extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['admin_id'])) {
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
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASEURL . '/anggota');
            exit;
        }
        $namaFileFoto = null;
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            $tmpName = $_FILES['foto']['tmp_name'];
            $namaFile = $_FILES['foto']['name'];
            $ekstensi = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
            $namaFileBaru = uniqid('anggota_') . '.' . $ekstensi;
            $targetDir = __DIR__ . '/../../public/img/anggota/';
            $targetFile = $targetDir . $namaFileBaru;
            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }
            if (move_uploaded_file($tmpName, $targetFile)) {
                $namaFileFoto = $namaFileBaru;
            } else {
                header('Location: ' . BASEURL . '/anggota');
                exit;
            }
        }
        $_POST['foto'] = $namaFileFoto;
        $_POST['id_admin'] = $_SESSION['admin_id'];
        if ($this->model('Anggota_model')->tambahAnggota($_POST) > 0) {
            $this->model('Log_model')->catat('TAMBAH', "Menambah Anggota: " . $_POST['nama']);
            $_SESSION['success'] = 'Data berhasil ditambahkan';
        } else {
            $_SESSION['error'] = 'Gagal menambahkan data';
        }
        header('Location: ' . BASEURL . '/anggota');
        exit;
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
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASEURL . '/anggota');
            exit;
        }
        $namaFileFoto = $_POST['foto_lama'];
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            $tmpName = $_FILES['foto']['tmp_name'];
            $namaFile = $_FILES['foto']['name'];
            $ekstensi = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
            $namaFileBaru = uniqid('anggota_') . '.' . $ekstensi;
            $targetDir = __DIR__ . '/../../public/img/anggota/';
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
                header('Location: ' . BASEURL . '/anggota');
                exit;
            }
        }
        $_POST['foto'] = $namaFileFoto;
        if ($this->model('Anggota_model')->updateAnggota($_POST) > 0) {
            $this->model('Log_model')->catat('UPDATE', "Mengupdate Anggota: " . $_POST['nama']);
            $_SESSION['success'] = 'Data berhasil diupdate';
        } else {
            $_SESSION['error'] = 'Gagal mengupdate data';
        }
        header('Location: ' . BASEURL . '/anggota');
        exit;
    }
    public function hapus($id)
    {
        $anggota = $this->model('Anggota_model')->getAnggotaById($id);
        if ($this->model('Anggota_model')->hapusAnggota($id) > 0) {
            $this->model('Log_model')->catat('HAPUS', "Menghapus Anggota ID: " . $id);
            if ($anggota && !empty($anggota['foto'])) {
                $foto_path = __DIR__ . '/../../public/img/anggota/' . $anggota['foto'];
                if (file_exists($foto_path)) {
                    unlink($foto_path);
                }
            }
            $_SESSION['success'] = 'Data berhasil dihapus';
        } else {
            $_SESSION['error'] = 'Gagal menghapus data';
        }
        header('Location: ' . BASEURL . '/anggota');
        exit;
    }
}