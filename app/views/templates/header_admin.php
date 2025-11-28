<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/dashboard.css">
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h3>Admin Panel</h3>
        </div>
        <ul class="nav-menu">
            <li><a href="<?= BASEURL; ?>/admin">Dashboard</a></li>
            <li><a href="<?= BASEURL; ?>/berita">Kelola Berita</a></li>
            <li><a href="#">Kelola Galeri</a></li>
            <li><a href="#">Kelola Riset</a></li>
            <li><a href="#">Anggota Lab</a></li>
            <li><a href="<?= BASEURL; ?>/admin/logout" class="logout">Logout</a></li>
        </ul>
    </div>
    <div class="main-content">
