<?php

class AdminController {
    public function showLogin() {
        // Tampilkan halaman login
        require_once __DIR__ . '/../../app/views/admin/login.php';
    }

    public function authenticate() {
        session_start();
        require_once __DIR__ . '/../../config/database.php';

        $username = $_POST['username'];
        $password = $_POST['password'];

        // Cek di tabel admin
        $stmt = $pdo->prepare("SELECT * FROM admin WHERE username = ?");
        $stmt->execute([$username]);
        $admin = $stmt->fetch();

        if ($admin && password_verify($password, $admin['password_hash'])) {
            $_SESSION['admin_id'] = $admin['id_admin'];
            $_SESSION['username'] = $admin['username'];
            $_SESSION['role'] = 'admin';
            header('Location: /admin/dashboard');
            exit;
        }

        // Cek di tabel super_admin
        $stmt = $pdo->prepare("SELECT * FROM super_admin WHERE username = ?");
        $stmt->execute([$username]);
        $super_admin = $stmt->fetch();

        if ($super_admin && password_verify($password, $super_admin['password_hash'])) {
            $_SESSION['admin_id'] = $super_admin['id_super_admin'];
            $_SESSION['username'] = $super_admin['username'];
            $_SESSION['role'] = 'super_admin';
            header('Location: /admin/dashboard');
            exit;
        }

        // Jika tidak ada yang cocok
        header('Location: /admin/login?error=1');
        exit;
    }

    public function dashboard() {
        session_start();

        if (!isset($_SESSION['admin_id'])) {
            header('Location: /admin/login');
            exit;
        }

        $role = $_SESSION['role'];

        // Tampilkan halaman dashboard
        require_once __DIR__ . '/../../app/views/admin/dashboard.php';
    }
}
