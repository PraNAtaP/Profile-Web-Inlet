<?php
class Profile extends Controller
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
        $data['judul'] = 'Profil Saya';
        $data['admin'] = $this->model('Admin_model')->getAdminById($_SESSION['admin_id']);
        $this->view('templates/header_admin', $data);
        $this->view('admin/profile/index', $data);
        $this->view('templates/footer_admin');
    }
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST['id_admin'] = $_SESSION['admin_id'];
            if ($this->model('Admin_model')->updateAdmin($_POST) > 0) {
                if (isset($_POST['nama'])) {
                    $_SESSION['admin_name'] = $_POST['nama'];
                }
                $_SESSION['success'] = 'Profil berhasil diupdate';
            } else {
                $_SESSION['error'] = 'Gagal mengupdate profil';
            }
        }
        header('Location: ' . BASEURL . '/profile');
        exit;
    }
}
