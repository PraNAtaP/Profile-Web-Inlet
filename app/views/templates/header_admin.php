<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/sidebar-modern.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/dashboard.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        /* Common styles for admin pages */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            display: flex;
        }

        .main-content {
            flex-grow: 1;
            padding: 20px;
            transition: margin-left 0.3s;
        }

        .container {
            max-width: 100%;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .table th {
            background-color: #f8f9fa;
            font-weight: 600;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .btn {
            display: inline-block;
            padding: 8px 12px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            border: none;
            cursor: pointer;
            margin: 0 2px;
            color: white !important;
        }

        .btn-add {
            background-color: #28a745;
            float: right;
            margin-bottom: 20px;
        }

        .btn-edit {
            background-color: #ffc107;
            color: #212529 !important;
        }

        .btn-delete {
            background-color: #dc3545;
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        .sidebar-menu {
            margin-top: 20px;
            color: #f2f2f2;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <img src="../../../public/img/LOGO-icon.png" alt="">
        <ul class="sidebar-menu">
            <li><a href="<?= BASEURL; ?>/admin/dashboard">Dashboard</a></li>
            <li><a href="<?= BASEURL; ?>/berita">Berita</a></li>
            <li><a href="<?= BASEURL; ?>/riset">Riset Activities</a></li>
            <li><a href="<?= BASEURL; ?>/produk">Produk Lab</a></li>
            <li><a href="<?= BASEURL; ?>/partner">Media Partner</a></li>
            <li><a href="<?= BASEURL; ?>/galeri">Kelola Galeri</a></li>
            <li><a href="<?= BASEURL; ?>/anggota">Anggota Lab</a></li>
            <li><a href="<?= BASEURL; ?>/pesan">Pesan Masuk</a></li>
            <li><a href="<?= BASEURL; ?>/log">Activity Log</a></li>
        </ul>
        <div class="sidebar-footer">
            <a href="<?= BASEURL; ?>/admin/logout" class="logout-btn">Logout</a>
        </div>
    </div>

    <div class="main-content">