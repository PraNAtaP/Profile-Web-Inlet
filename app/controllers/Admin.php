<?php

class Admin extends Controller
{
    public function __construct()
    {
        // Constructor bisa digunakan untuk memuat model atau helper
    }

    /**
     * Halaman utama admin (Dashboard)
     * Ini adalah gatekeeper, memeriksa session sebelum menampilkan view.
     */
    public function index()
    {
        if (!isset($_SESSION['admin_id'])) {
            header('Location: ' . BASEURL . '/admin/login');
            exit;
        }
    
        $data['judul'] = 'Dashboard';
        $data['admin_name'] = $_SESSION['admin_name'] ?? 'Admin';
    
        // Panggil Model
        $adminModel = $this->model('Admin_model');
    
        // Cek jika Visitor_model ada sebelum memanggil
        $visitorModel = null;
        if (file_exists('../app/models/Visitor_model.php')) {
            $visitorModel = $this->model('Visitor_model');
        }
    
        // Isi Semua Variable Data yang diminta View
        $data['online_users']  = $visitorModel ? $visitorModel->countOnlineUsers() : 0;
        $data['total_berita']  = $adminModel->countData('berita');
        $data['total_galeri']  = $adminModel->countData('galeri');
        $data['total_riset']   = $adminModel->countData('riset');
        $data['total_anggota'] = $adminModel->countData('anggota_lab');
        $data['total_produk']  = $adminModel->countData('produk_lab');
        $data['total_partner'] = $adminModel->countData('media_partner');
        $data['total_admin']   = $adminModel->countData('admin');
    
        $this->view('templates/header_admin', $data);
        $this->view('admin/dashboard', $data);
        $this->view('templates/footer_admin');
    }

    /**
     * Menampilkan halaman login
     */
    public function login()
    {
        // Jika sudah login, redirect ke dashboard
        if (isset($_SESSION['admin_id'])) {
            header('Location: ' . BASEURL . '/admin');
            exit;
        }
        
        $data['judul'] = 'Login Admin';
        $this->view('admin/login', $data);
    }

    /**
     * Proses otentikasi login
     */
    public function auth()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $adminModel = $this->model('Admin_model');
            $adminData = $adminModel->getAdminByUsername($username);

            if ($adminData && password_verify($password, $adminData['password_hash'])) {
                // Login sukses, set session
                $_SESSION['admin_logged_in'] = true; // Dipertahankan untuk backward compatibility jika ada
                $_SESSION['admin_id'] = $adminData['id_admin'];
                $_SESSION['admin_name'] = $adminData['nama'];

                header('Location: ' . BASEURL . '/admin');
                exit;
            } else {
                // Login gagal
                $_SESSION['login_error'] = 'Username atau password salah!';
                header('Location: ' . BASEURL . '/admin/login');
                exit;
            }
        } else {
            header('Location: ' . BASEURL . '/admin/login');
            exit;
        }
    }

    /**
     * Proses logout
     */
    public function logout()
    {
        session_unset();
        session_destroy();
        header('Location: ' . BASEURL . '/admin/login');
        exit;
    }

    public function hash()
    {
        echo password_hash('admin123', PASSWORD_DEFAULT);
    }
}
