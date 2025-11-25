<?php

class NewsController {
    public function index() {
        session_start();
        if (!isset($_SESSION['admin_id'])) {
            header('Location: /admin/login');
            exit;
        }

        require_once __DIR__ . '/../../config/database.php';
        $stmt = $pdo->query("SELECT * FROM berita");
        $news = $stmt->fetchAll();

        require_once __DIR__ . '/../../app/views/admin/news/index.php';
    }

    public function create() {
        session_start();
        if (!isset($_SESSION['admin_id'])) {
            header('Location: /admin/login');
            exit;
        }

        require_once __DIR__ . '/../../app/views/admin/news/create.php';
    }

    public function store() {
        session_start();
        if (!isset($_SESSION['admin_id'])) {
            header('Location: /admin/login');
            exit;
        }

        require_once __DIR__ . '/../../config/database.php';

        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        $video_embed = $_POST['video_embed'];
        $id_admin = $_SESSION['admin_id'];

        $stmt = $pdo->prepare("INSERT INTO berita (judul, isi, video_embed, id_admin) VALUES (?, ?, ?, ?)");
        $stmt->execute([$judul, $isi, $video_embed, $id_admin]);
        header('Location: /admin/crud/news');
        exit;
    }

    public function edit($id) {
        session_start();
        if (!isset($_SESSION['admin_id'])) {
            header('Location: /admin/login');
            exit;
        }

        require_once __DIR__ . '/../../config/database.php';
        $stmt = $pdo->prepare("SELECT * FROM berita WHERE id_berita = ?");
        $stmt->execute([$id]);
        $news_item = $stmt->fetch();

        if (!$news_item) {
            echo "News item not found.";
            exit;
        }

        require_once __DIR__ . '/../../app/views/admin/news/edit.php';
    }

    public function update($id) {
        session_start();
        if (!isset($_SESSION['admin_id'])) {
            header('Location: /admin/login');
            exit;
        }

        require_once __DIR__ . '/../../config/database.php';

        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        $video_embed = $_POST['video_embed'];

        $stmt = $pdo->prepare("UPDATE berita SET judul = ?, isi = ?, video_embed = ? WHERE id_berita = ?");
        $stmt->execute([$judul, $isi, $video_embed, $id]);

        header('Location: /admin/crud/news');
        exit;
    }

    public function delete($id) {
        session_start();
        if (!isset($_SESSION['admin_id'])) {
            header('Location: /admin/login');
            exit;
        }

        require_once __DIR__ . '/../../config/database.php';

        $stmt = $pdo->prepare("DELETE FROM berita WHERE id_berita = ?");
        $stmt->execute([$id]);

        header('Location: /admin/crud/news');
        exit;
    }
}
