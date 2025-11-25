<?php

class ResearchController {
    public function index() {
        session_start();
        if (!isset($_SESSION['admin_id'])) {
            header('Location: /admin/login');
            exit;
        }

        require_once __DIR__ . '/../../config/database.php';
        $stmt = $pdo->query("SELECT * FROM riset");
        $researches = $stmt->fetchAll();

        require_once __DIR__ . '/../../app/views/admin/research/index.php';
    }

    public function create() {
        session_start();
        if (!isset($_SESSION['admin_id'])) {
            header('Location: /admin/login');
            exit;
        }

        require_once __DIR__ . '/../../app/views/admin/research/create.php';
    }

    public function store() {
        session_start();
        if (!isset($_SESSION['admin_id'])) {
            header('Location: /admin/login');
            exit;
        }

        require_once __DIR__ . '/../../config/database.php';

        $judul_riset = $_POST['judul_riset'];
        $deskripsi = $_POST['deskripsi'];
        $peneliti = $_POST['peneliti'];
        $tanggal_publikasi = $_POST['tanggal_publikasi'];
        $video_embed = $_POST['video_embed'];
        $id_admin = $_SESSION['admin_id'];

        $file_dokumen = $_FILES['file_dokumen'];
        $file_dokumen_name = uniqid() . '_' . $file_dokumen['name'];
        $upload_dir = __DIR__ . '/../../public/uploads/';
        $upload_file = $upload_dir . $file_dokumen_name;

        if (move_uploaded_file($file_dokumen['tmp_name'], $upload_file)) {
            $stmt = $pdo->prepare("INSERT INTO riset (judul_riset, deskripsi, peneliti, tanggal_publikasi, file_dokumen, video_embed, id_admin) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$judul_riset, $deskripsi, $peneliti, $tanggal_publikasi, $file_dokumen_name, $video_embed, $id_admin]);
            header('Location: /admin/crud/research');
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
        $stmt = $pdo->prepare("SELECT * FROM riset WHERE id_riset = ?");
        $stmt->execute([$id]);
        $research = $stmt->fetch();

        if (!$research) {
            echo "Research not found.";
            exit;
        }

        require_once __DIR__ . '/../../app/views/admin/research/edit.php';
    }

    public function update($id) {
        session_start();
        if (!isset($_SESSION['admin_id'])) {
            header('Location: /admin/login');
            exit;
        }

        require_once __DIR__ . '/../../config/database.php';

        $stmt = $pdo->prepare("SELECT * FROM riset WHERE id_riset = ?");
        $stmt->execute([$id]);
        $research = $stmt->fetch();

        $judul_riset = $_POST['judul_riset'];
        $deskripsi = $_POST['deskripsi'];
        $peneliti = $_POST['peneliti'];
        $tanggal_publikasi = $_POST['tanggal_publikasi'];
        $video_embed = $_POST['video_embed'];
        $file_dokumen_name = $research['file_dokumen'];

        if (isset($_FILES['file_dokumen']) && $_FILES['file_dokumen']['error'] === UPLOAD_ERR_OK) {
            $file_dokumen = $_FILES['file_dokumen'];
            $file_dokumen_name = uniqid() . '_' . $file_dokumen['name'];
            $upload_dir = __DIR__ . '/../../public/uploads/';
            $upload_file = $upload_dir . $file_dokumen_name;
            move_uploaded_file($file_dokumen['tmp_name'], $upload_file);
        }

        $stmt = $pdo->prepare("UPDATE riset SET judul_riset = ?, deskripsi = ?, peneliti = ?, tanggal_publikasi = ?, file_dokumen = ?, video_embed = ? WHERE id_riset = ?");
        $stmt->execute([$judul_riset, $deskripsi, $peneliti, $tanggal_publikasi, $file_dokumen_name, $video_embed, $id]);

        header('Location: /admin/crud/research');
        exit;
    }

    public function delete($id) {
        session_start();
        if (!isset($_SESSION['admin_id'])) {
            header('Location: /admin/login');
            exit;
        }

        require_once __DIR__ . '/../../config/database.php';

        $stmt = $pdo->prepare("SELECT * FROM riset WHERE id_riset = ?");
        $stmt->execute([$id]);
        $research = $stmt->fetch();

        if ($research) {
            $file_path = __DIR__ . '/../../public/uploads/' . $research['file_dokumen'];
            if (file_exists($file_path)) {
                unlink($file_path);
            }

            $stmt = $pdo->prepare("DELETE FROM riset WHERE id_riset = ?");
            $stmt->execute([$id]);
        }

        header('Location: /admin/crud/research');
        exit;
    }
}
