<?php

class LabMemberController {
    public function index() {
        session_start();
        if (!isset($_SESSION['admin_id'])) {
            header('Location: /admin/login');
            exit;
        }

        require_once __DIR__ . '/../../config/database.php';
        $stmt = $pdo->query("SELECT * FROM anggota_lab");
        $lab_members = $stmt->fetchAll();

        require_once __DIR__ . '/../../app/views/admin/lab_members/index.php';
    }

    public function create() {
        session_start();
        if (!isset($_SESSION['admin_id'])) {
            header('Location: /admin/login');
            exit;
        }

        require_once __DIR__ . '/../../app/views/admin/lab_members/create.php';
    }

    public function store() {
        session_start();
        if (!isset($_SESSION['admin_id'])) {
            header('Location: /admin/login');
            exit;
        }

        require_once __DIR__ . '/../../config/database.php';

        $nama = $_POST['nama'];
        $jabatan = $_POST['jabatan'];
        $kontak = $_POST['kontak'];
        $email = $_POST['email'];
        $id_admin = $_SESSION['admin_id'];

        $foto = $_FILES['foto'];
        $foto_name = uniqid() . '_' . $foto['name'];
        $upload_dir = __DIR__ . '/../../public/uploads/';
        $upload_file = $upload_dir . $foto_name;

        if (move_uploaded_file($foto['tmp_name'], $upload_file)) {
            $stmt = $pdo->prepare("INSERT INTO anggota_lab (nama, jabatan, kontak, email, foto, id_admin) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$nama, $jabatan, $kontak, $email, $foto_name, $id_admin]);
            header('Location: /admin/crud/lab_members');
            exit;
        } else {
            echo "File upload failed.";
        }
    }

    public function edit($id) {
        session_start();
        if (!isset($_SESSION['admin_id'])) {
            header('Location: /admin/login');
            exit;
        }

        require_once __DIR__ . '/../../config/database.php';
        $stmt = $pdo->prepare("SELECT * FROM anggota_lab WHERE id_anggota = ?");
        $stmt->execute([$id]);
        $lab_member = $stmt->fetch();

        if (!$lab_member) {
            echo "Lab member not found.";
            exit;
        }

        require_once __DIR__ . '/../../app/views/admin/lab_members/edit.php';
    }

    public function update($id) {
        session_start();
        if (!isset($_SESSION['admin_id'])) {
            header('Location: /admin/login');
            exit;
        }

        require_once __DIR__ . '/../../config/database.php';

        $stmt = $pdo->prepare("SELECT * FROM anggota_lab WHERE id_anggota = ?");
        $stmt->execute([$id]);
        $lab_member = $stmt->fetch();

        $nama = $_POST['nama'];
        $jabatan = $_POST['jabatan'];
        $kontak = $_POST['kontak'];
        $email = $_POST['email'];
        $foto_name = $lab_member['foto'];

        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            $foto = $_FILES['foto'];
            $foto_name = uniqid() . '_' . $foto['name'];
            $upload_dir = __DIR__ . '/../../public/uploads/';
            $upload_file = $upload_dir . $foto_name;
            move_uploaded_file($foto['tmp_name'], $upload_file);
        }

        $stmt = $pdo->prepare("UPDATE anggota_lab SET nama = ?, jabatan = ?, kontak = ?, email = ?, foto = ? WHERE id_anggota = ?");
        $stmt->execute([$nama, $jabatan, $kontak, $email, $foto_name, $id]);

        header('Location: /admin/crud/lab_members');
        exit;
    }

    public function delete($id) {
        session_start();
        if (!isset($_SESSION['admin_id'])) {
            header('Location: /admin/login');
            exit;
        }

        require_once __DIR__ . '/../../config/database.php';

        $stmt = $pdo->prepare("SELECT * FROM anggota_lab WHERE id_anggota = ?");
        $stmt->execute([$id]);
        $lab_member = $stmt->fetch();

        if ($lab_member) {
            $foto_path = __DIR__ . '/../../public/uploads/' . $lab_member['foto'];
            if (file_exists($foto_path)) {
                unlink($foto_path);
            }

            $stmt = $pdo->prepare("DELETE FROM anggota_lab WHERE id_anggota = ?");
            $stmt->execute([$id]);
        }

        header('Location: /admin/crud/lab_members');
        exit;
    }
}
