<?php

class AdminCrudController {
    public function __construct() {
        session_start();
        if (!isset($_SESSION['admin_id']) || $_SESSION['role'] !== 'super_admin') {
            header('Location: /admin/login');
            exit;
        }
    }

    public function index() {
        require_once __DIR__ . '/../../config/database.php';
        $stmt = $pdo->query("SELECT * FROM admin");
        $admins = $stmt->fetchAll();

        require_once __DIR__ . '/../../app/views/admin/admins/index.php';
    }

    public function create() {
        require_once __DIR__ . '/../../app/views/admin/admins/create.php';
    }

    public function store() {
        require_once __DIR__ . '/../../config/database.php';

        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $id_super_admin = $_SESSION['admin_id'];

        $stmt = $pdo->prepare("INSERT INTO admin (nama, email, username, password_hash, id_super_admin) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nama, $email, $username, $password, $id_super_admin]);
        header('Location: /admin/crud/admins');
        exit;
    }

    public function edit($id) {
        require_once __DIR__ . '/../../config/database.php';
        $stmt = $pdo->prepare("SELECT * FROM admin WHERE id_admin = ?");
        $stmt->execute([$id]);
        $admin = $stmt->fetch();

        if (!$admin) {
            echo "Admin not found.";
            exit;
        }

        require_once __DIR__ . '/../../app/views/admin/admins/edit.php';
    }

    public function update($id) {
        require_once __DIR__ . '/../../config/database.php';

        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $username = $_POST['username'];

        if (!empty($_POST['password'])) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("UPDATE admin SET nama = ?, email = ?, username = ?, password_hash = ? WHERE id_admin = ?");
            $stmt->execute([$nama, $email, $username, $password, $id]);
        } else {
            $stmt = $pdo->prepare("UPDATE admin SET nama = ?, email = ?, username = ? WHERE id_admin = ?");
            $stmt->execute([$nama, $email, $username, $id]);
        }

        header('Location: /admin/crud/admins');
        exit;
    }

    public function delete($id) {
        require_once __DIR__ . '/../../config/database.php';

        $stmt = $pdo->prepare("DELETE FROM admin WHERE id_admin = ?");
        $stmt->execute([$id]);

        header('Location: /admin/crud/admins');
        exit;
    }
}
