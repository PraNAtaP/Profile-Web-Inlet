<?php
// /app/controllers/HomeController.php

class HomeController {
    public function index() {
        require_once __DIR__ . '/../views/home/init.php';
        require_once __DIR__ . '/../views/home/index.php';
    }

    public function about() {
        // Load View
        require_once BASE_PATH . '/app/views/home/about.php';
    }
}
?>