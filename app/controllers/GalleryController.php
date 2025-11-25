<?php

class GalleryController {
    public function index() {
        session_start();
        if (!isset($_SESSION['admin_id'])) {
            header('Location: /admin/login');
            exit;
        }

        require_once __DIR__ . '/../../config/database.php';
        $stmt = $pdo->query("SELECT * FROM galeri");
        $galleries = $stmt->fetchAll();

        require_once __DIR__ . '/../../app/views/admin/gallery/index.php';
    }

    public function create() {
        session_start();
        if (!isset($_SESSION['admin_id'])) {
            header('Location: /admin/login');
            exit;
        }

        require_once __DIR__ . '/../../app/views/admin/gallery/create.php';
    }

    public function store() {
        session_start();
        if (!isset($_SESSION['admin_id'])) {
            header('Location: /admin/login');
            exit;
        }

        require_once __DIR__ . '/../../config/database.php';

        $judul = $_POST['judul'];
        $deskripsi = $_POST['deskripsi'];
        $video_embed = $_POST['video_embed'];
        $id_admin = $_SESSION['admin_id'];

        $foto = $_FILES['foto'];
        $foto_name = uniqid() . '_' . $foto['name'];
        $upload_dir = __DIR__ . '/../../public/uploads/';
        $upload_file = $upload_dir . $foto_name;

        if (move_uploaded_file($foto['tmp_name'], $upload_file)) {
            $stmt = $pdo->prepare("INSERT INTO galeri (judul, deskripsi, foto, video_embed, id_admin) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$judul, $deskripsi, $foto_name, $video_embed, $id_admin]);
            header('Location: /admin/crud/gallery');
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
        $stmt = $pdo->prepare("SELECT * FROM galeri WHERE id_galeri = ?");
        $stmt->execute([$id]);
        $gallery = $stmt->fetch();

        if (!$gallery) {
            echo "Gallery item not found.";
            exit;
        }

        require_once __DIR__ . '/../../app/views/admin/gallery/edit.php';
    }

    public function update($id) {
        session_start();
        if (!isset($_SESSION['admin_id'])) {
            header('Location: /admin/login');
            exit;
        }

        require_once __DIR__ . '/../../config/database.php';

        $stmt = $pdo->prepare("SELECT * FROM galeri WHERE id_galeri = ?");
        $stmt->execute([$id]);
        $gallery = $stmt->fetch();

        $judul = $_POST['judul'];
        $deskripsi = $_POST['deskripsi'];
        $video_embed = $_POST['video_embed'];
        $foto_name = $gallery['foto'];

        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            $foto = $_FILES['foto'];
            $foto_name = uniqid() . '_' . $foto['name'];
            $upload_dir = __DIR__ . '/../../public/uploads/';
            $upload_file = $upload_dir . $foto_name;
            move_uploaded_file($foto['tmp_name'], $upload_file);
        }

        $stmt = $pdo->prepare("UPDATE galeri SET judul = ?, deskripsi = ?, foto = ?, video_embed = ? WHERE id_galeri = ?");
        $stmt->execute([$judul, $deskripsi, $foto_name, $video_embed, $id]);

        header('Location: /admin/crud/gallery');
        exit;
    }

    public function delete($id) {
        session_start();
        if (!isset($_SESSION['admin_id'])) {
            header('Location: /admin/login');
            exit;
        }

        require_once __DIR__ . '/../../config/database.php';

        $stmt = $pdo->prepare("SELECT * FROM galeri WHERE id_galeri = ?");
        $stmt->execute([$id]);
        $gallery = $stmt->fetch();

        if ($gallery) {
            $foto_path = __DIR__ . '/../../public/uploads/' . $gallery['foto'];
            if (file_exists($foto_path)) {
                unlink($foto_path);
            }

            $stmt = $pdo->prepare("DELETE FROM galeri WHERE id_galeri = ?");
            $stmt->execute([$id]);
        }

        header('Location: /admin/crud/gallery');
        exit;
    }
}
