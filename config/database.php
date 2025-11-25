<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'inlet_db');
define('DB_USER', 'pranamac'); 
define('DB_PASS', '12345678'); 
define('DB_DRIVER', 'pgsql');

try {
    $pdo = new PDO(
        DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME, 
        DB_USER, 
        DB_PASS
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi Database Gagal: " . $e->getMessage());
}
?>