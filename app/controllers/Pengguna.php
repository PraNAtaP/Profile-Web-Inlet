<?php
class Pengguna extends Controller
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
        $data['judul'] = 'Kelola Admin';
        $data['admin'] = $this->model('Admin_model')->getAllAdmin();
        $this->view('templates/header_admin', $data);
        $this->view('admin/pengguna/index', $data);
        $this->view('templates/footer_admin');
    }
    public function tambah()
    {
        $data['judul'] = 'Tambah Admin';
        $this->view('templates/header_admin', $data);
        $this->view('admin/pengguna/form', $data);
        $this->view('templates/footer_admin');
    }
    public function simpan()
    {
        if ($this->model('Admin_model')->tambahAdmin($_POST) > 0) {
            $_SESSION['success'] = 'Data berhasil ditambahkan';
            header('Location: ' . BASEURL . '/pengguna');
            exit;
        } else {
            $_SESSION['error'] = 'Gagal menambahkan data';
            header('Location: ' . BASEURL . '/pengguna');
            exit;
        }
    }
    public function edit($id)
    {
        $data['judul'] = 'Edit Admin';
        $data['admin'] = $this->model('Admin_model')->getAdminById($id);
        $this->view('templates/header_admin', $data);
        $this->view('admin/pengguna/form', $data);
        $this->view('templates/footer_admin');
    }
    public function update()
    {
        if ($this->model('Admin_model')->updateAdmin($_POST) > 0) {
            $_SESSION['success'] = 'Data berhasil diupdate';
            header('Location: ' . BASEURL . '/pengguna');
            exit;
        } else {
            $_SESSION['error'] = 'Gagal mengupdate data';
            header('Location: ' . BASEURL . '/pengguna');
            exit;
        }
    }
    public function hapus($id)
    {
        if ($id == $_SESSION['admin_id']) {
            $_SESSION['error'] = 'Tidak dapat menghapus diri sendiri';
            header('Location: ' . BASEURL . '/pengguna');
            exit;
        }
        if ($this->model('Admin_model')->hapusAdmin($id) > 0) {
            $_SESSION['success'] = 'Data berhasil dihapus';
            header('Location: ' . BASEURL . '/pengguna');
            exit;
        } else {
            $_SESSION['error'] = 'Gagal menghapus data';
            header('Location: ' . BASEURL . '/pengguna');
            exit;
        }
    }
}
