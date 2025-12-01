<?php
require_once '../app/init.php';

try {
    $db = new Database;
    $db->query("SELECT setval('admin_id_admin_seq', (SELECT MAX(id_admin) FROM admin))");
    $db->execute();
    echo "Sequence 'admin_id_admin_seq' Berhasil Direset!";
} catch (PDOException $e) {
    echo "Gagal mereset sequence: " . $e->getMessage();
}