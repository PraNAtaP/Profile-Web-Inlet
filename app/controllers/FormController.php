<?php

class FormController {
    public function index() {
        session_start();
        if (!isset($_SESSION['admin_id'])) {
            header('Location: /admin/login');
            exit;
        }

        require_once __DIR__ . '/../../config/database.php';
        $stmt = $pdo->query("SELECT * FROM form");
        $forms = $stmt->fetchAll();

        require_once __DIR__ . '/../../app/views/admin/forms/index.php';
    }
}
