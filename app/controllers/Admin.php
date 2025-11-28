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
        if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
            header('Location: ' . BASEURL . '/../admin/login');
            exit;
        }

        $data['judul'] = 'Dashboard';
        $data['admin_name'] = $_SESSION['admin_name'];

        // Memuat view dashboard dengan template
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
        if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
            header('Location: ' . BASEURL . '/../admin');
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

            // FIX 1: Gunakan key 'password_hash' sesuai nama kolom di tabel DB kamu
            // FIX 2: Pastikan $adminData tidak kosong sebelum cek password
            if ($adminData && password_verify($password, $adminData['password_hash'])) {

                // Login sukses, set session
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_id'] = $adminData['id_admin']; // Sesuaikan PK juga (id atau id_admin?)
                $_SESSION['admin_name'] = $adminData['nama'];

                // FIX 3: Redirectnya jangan pake '/../', langsung aja append
                // Karena BASEURL udah '.../public', jadi hasilnya '.../public/admin'
                header('Location: ' . BASEURL . '/admin');
                exit;
            } else {
                // Login gagal
                // Debugging: Boleh nyalakan ini kalau mau liat errornya (hapus nanti)
                // var_dump($adminData, $password); die; 

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
        header('Location: ' . BASEURL . '/../admin/login');
        exit;
    }

    public function hash()
    {
        echo password_hash('admin123', PASSWORD_DEFAULT);
    }
}
