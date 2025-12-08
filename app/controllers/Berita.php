<?php
class Berita extends Controller
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
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASEURL . '/berita');
            exit;
        }
        $namaFileGambar = null;
        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
            $tmpName = $_FILES['gambar']['tmp_name'];
            $namaFile = $_FILES['gambar']['name'];
            $ekstensi = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
            $namaFileBaru = uniqid('brt_') . '.' . $ekstensi;
            $targetDir = __DIR__ . '/../../public/img/berita/';
            $targetFile = $targetDir . $namaFileBaru;
            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }
            if (move_uploaded_file($tmpName, $targetFile)) {
                $namaFileGambar = $namaFileBaru;
            } else {
                header('Location: ' . BASEURL . '/berita');
                exit;
            }
        }
        $_POST['video_embed'] = $namaFileGambar;
        $_POST['id_admin'] = $_SESSION['admin_id'];
        if ($this->model('Berita_model')->tambahBerita($_POST) > 0) {
            $this->model('Log_model')->catat('TAMBAH', "Menambah Berita: " . $_POST['judul']);
        }
        header('Location: ' . BASEURL . '/berita');
        exit;
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
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASEURL . '/berita');
            exit;
        }
        $namaFileGambar = $_POST['gambar_lama'];
        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
            $tmpName = $_FILES['gambar']['tmp_name'];
            $namaFile = $_FILES['gambar']['name'];
            $ekstensi = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
            $namaFileBaru = uniqid('brt_') . '.' . $ekstensi;
            $targetDir = __DIR__ . '/../../public/img/berita/';
            $targetFile = $targetDir . $namaFileBaru;
            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }
            if (move_uploaded_file($tmpName, $targetFile)) {
                $namaFileGambar = $namaFileBaru;
                $old_image_path = $targetDir . $_POST['gambar_lama'];
                if (!empty($_POST['gambar_lama']) && file_exists($old_image_path)) {
                    unlink($old_image_path);
                }
            } else {
                header('Location: ' . BASEURL . '/berita');
                exit;
            }
        }
        $_POST['video_embed'] = $namaFileGambar;
        if ($this->model('Berita_model')->updateBerita($_POST) > 0) {
            $this->model('Log_model')->catat('UPDATE', "Mengupdate Berita: " . $_POST['judul']);
        }
        header('Location: ' . BASEURL . '/berita');
        exit;
    }
    public function hapus($id)
    {
        if ($this->model('Berita_model')->hapusBerita($id) > 0) {
            $this->model('Log_model')->catat('HAPUS', "Menghapus Berita ID: " . $id);
        } else {
        }
        header('Location: ' . BASEURL . '/berita');
        exit;
    }
}