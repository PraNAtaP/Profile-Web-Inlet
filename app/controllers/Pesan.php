<?php
class Pesan extends Controller
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
        $data['judul'] = 'Pesan Masuk';
        $data['pesan'] = $this->model('Contact_model')->getAllPesan();
        $this->view('templates/header_admin', $data);
        $this->view('admin/pesan/index', $data);
        $this->view('templates/footer_admin', $data);
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Pesan';
        $data['pesan'] = $this->model('Contact_model')->getPesanById($id);
        $this->view('templates/header_admin', $data);
        $this->view('admin/pesan/detail', $data);
        $this->view('templates/footer_admin');
    }

    public function hapus($id)
    {
        $pesan = $this->model('Contact_model')->getPesanById($id);
        if ($this->model('Contact_model')->hapusPesan($id) > 0) {
            $this->model('Log_model')->catat('HAPUS', "Menghapus Pesan dari " . $pesan['nama']);
            header('Location: ' . BASEURL . '/pesan');
            exit;
        } else {
            header('Location: ' . BASEURL . '/pesan');
            exit;
        }
    }
}
