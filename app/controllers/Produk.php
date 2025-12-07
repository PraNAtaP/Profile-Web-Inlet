<?php
class Produk extends Controller
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
        $data['judul'] = 'Produk Lab';
        $data['produk'] = $this->model('Produk_model')->getAllProduk();
        $this->view('templates/header_admin', $data);
        $this->view('admin/produk/index', $data);
        $this->view('templates/footer_admin');
    }
    public function tambah()
    {
        $data['judul'] = 'Tambah Produk';
        $this->view('templates/header_admin', $data);
        $this->view('admin/produk/form', $data); 
        $this->view('templates/footer_admin');
    }
    public function edit($id)
    {
        $data['judul'] = 'Edit Produk';
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
        $namaFileGambar = ''; 
        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
            $namaAsli = $_FILES['gambar']['name'];
            $tmpName  = $_FILES['gambar']['tmp_name'];
            $ekstensi = strtolower(pathinfo($namaAsli, PATHINFO_EXTENSION));
            $allowed  = ['jpg', 'jpeg', 'png', 'webp'];
            if (in_array($ekstensi, $allowed)) {
                $namaFileBaru = uniqid('produk_') . '.' . $ekstensi;
                $targetDir = __DIR__ . '/../../public/img/produk/';
                $targetFile = $targetDir . $namaFileBaru;
                if (!file_exists($targetDir)) {
                    mkdir($targetDir, 0755, true);
                }
                if (move_uploaded_file($tmpName, $targetFile)) {
                    $namaFileGambar = $namaFileBaru;
                }
            }
        }
        $_POST['gambar'] = $namaFileGambar;
        $_POST['id_admin'] = $_SESSION['admin_id'] ?? 1;
        if ($this->model('Produk_model')->tambahProduk($_POST) > 0) {
            $this->model('Log_model')->catat('TAMBAH', "Menambah Produk: " . $_POST['judul']);
            header('Location: ' . BASEURL . '/produk');
            exit;
        } else {
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
        $namaFileGambar = $_POST['gambar_lama'];
        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
            $namaAsli = $_FILES['gambar']['name'];
            $tmpName  = $_FILES['gambar']['tmp_name'];
            $ekstensi = strtolower(pathinfo($namaAsli, PATHINFO_EXTENSION));
            $allowed  = ['jpg', 'jpeg', 'png', 'webp'];
            if (in_array($ekstensi, $allowed)) {
                $namaFileBaru = uniqid('produk_') . '.' . $ekstensi;
                $targetDir = __DIR__ . '/../../public/img/produk/';
                $targetFile = $targetDir . $namaFileBaru;
                if (!file_exists($targetDir)) {
                    mkdir($targetDir, 0755, true);
                }
                if (move_uploaded_file($tmpName, $targetFile)) {
                    $namaFileGambar = $namaFileBaru;
                    $pathLama = $targetDir . $_POST['gambar_lama'];
                    if (!empty($_POST['gambar_lama']) && file_exists($pathLama)) {
                        unlink($pathLama);
                    }
                }
            }
        }
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
