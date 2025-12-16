<?php
class Partner extends Controller
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
        $data['judul'] = 'Media Partner';
        $data['partner'] = $this->model('Partner_model')->getAllPartner();
        $this->view('templates/header_admin', $data);
        $this->view('admin/partner/index', $data);
        $this->view('templates/footer_admin');
    }
    public function form() 
    {
        $data['judul'] = 'Tambah Media Partner';
        $this->view('templates/header_admin', $data);
        $this->view('admin/partner/form', $data);
        $this->view('templates/footer_admin');
    }
    public function edit($id)
    {
        $data['judul'] = 'Edit Media Partner';
        $data['partner'] = $this->model('Partner_model')->getPartnerById($id);
        if (!$data['partner']) {
            header('Location: ' . BASEURL . '/partner');
            exit;
        }
        $this->view('templates/header_admin', $data);
        $this->view('admin/partner/form', $data);
        $this->view('templates/footer_admin');
    }
    public function simpan()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASEURL . '/partner');
            exit;
        }
        $namaFileGambar = null;
        if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
            $tmpName = $_FILES['logo']['tmp_name'];
            $namaFile = $_FILES['logo']['name'];
            $ekstensi = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
            $namaFileBaru = uniqid('prt_') . '.' . $ekstensi;
            $targetDir = __DIR__ . '/../../public/img/partner/';
            $targetFile = $targetDir . $namaFileBaru;
            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }
            if (move_uploaded_file($tmpName, $targetFile)) {
                $namaFileGambar = $namaFileBaru;
            } else {
                header('Location: ' . BASEURL . '/partner');
                exit;
            }
        }
        $_POST['logo'] = $namaFileGambar;
        $_POST['id_admin'] = $_SESSION['admin_id'] ?? 1;
        if ($this->model('Partner_model')->tambahPartner($_POST) > 0) {
            $this->model('Log_model')->catat('TAMBAH', "Menambah Partner: " . $_POST['nama']);
            $_SESSION['success'] = 'Data berhasil ditambahkan';
        } else {
            $_SESSION['error'] = 'Gagal menambahkan data';
        }
        header('Location: ' . BASEURL . '/partner');
        exit;
    }
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASEURL . '/partner');
            exit;
        }
        $namaFileGambar = $_POST['logo_lama'];
        if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
            $tmpName = $_FILES['logo']['tmp_name'];
            $namaFile = $_FILES['logo']['name'];
            $ekstensi = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
            $namaFileBaru = uniqid('prt_') . '.' . $ekstensi;
            $targetDir = __DIR__ . '/../../public/img/partner/';
            $targetFile = $targetDir . $namaFileBaru;
            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }
            if (move_uploaded_file($tmpName, $targetFile)) {
                $namaFileGambar = $namaFileBaru;
                $old_image_path = $targetDir . $_POST['logo_lama'];
                if (!empty($_POST['logo_lama']) && file_exists($old_image_path)) {
                    unlink($old_image_path);
                }
            } else {
                header('Location: ' . BASEURL . '/partner');
                exit;
            }
        }
        $_POST['logo'] = $namaFileGambar;
        if ($this->model('Partner_model')->updatePartner($_POST) > 0) {
            $this->model('Log_model')->catat('UPDATE', "Mengupdate Partner: " . $_POST['nama']);
            $_SESSION['success'] = 'Data berhasil diupdate';
        } else {
            $_SESSION['error'] = 'Gagal mengupdate data';
        }
        header('Location: ' . BASEURL . '/partner');
        exit;
    }
    public function hapus($id)
    {
        $partner = $this->model('Partner_model')->getPartnerById($id);
        if ($this->model('Partner_model')->hapusPartner($id) > 0) {
            $this->model('Log_model')->catat('HAPUS', "Menghapus Partner ID: " . $id);
            if ($partner && !empty($partner['logo'])) {
                $logo_path = __DIR__ . '/../../public/img/partner/' . $partner['logo'];
                if (file_exists($logo_path)) {
                    unlink($logo_path);
                }
            }
            $_SESSION['success'] = 'Data berhasil dihapus';
        } else {
            $_SESSION['error'] = 'Gagal menghapus data';
        }
        header('Location: ' . BASEURL . '/partner');
        exit;
    }
}
