<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>

<body>

    <div class="sidebar">
        <img src="<?= BASEURL; ?>/img/LOGO-icon.png" alt="Logo Admin">
        <ul class="sidebar-menu">
            <li><a href="<?= BASEURL; ?>/admin/dashboard">Dashboard</a></li>
            <li><a href="<?= BASEURL; ?>/berita">Berita</a></li>
            <li><a href="<?= BASEURL; ?>/riset">Riset Activities</a></li>
            <li><a href="<?= BASEURL; ?>/produk">Produk Lab</a></li>
            <li><a href="<?= BASEURL; ?>/partner">Media Partner</a></li>
            <li><a href="<?= BASEURL; ?>/galeri">Kelola Galeri</a></li>
            <li><a href="<?= BASEURL; ?>/anggota">Anggota Lab</a></li>
            <?php if (isset($_SESSION['admin_role']) && $_SESSION['admin_role'] == 'super_admin') : ?>
            <li><a href="<?= BASEURL; ?>/pengguna">Kelola Admin</a></li>
            <?php endif; ?>
            <li><a href="<?= BASEURL; ?>/pesan">Pesan Masuk</a></li>
            <li><a href="<?= BASEURL; ?>/log">Activity Log</a></li>
        </ul>
        <div class="sidebar-footer">
            <a href="<?= BASEURL; ?>/admin/logout" class="logout-btn">Logout</a>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h2><?= htmlspecialchars($data['judul']); ?></h2>
            <a href="<?= BASEURL; ?>/profile" class="user-info-link">
                <div class="user-info">
                    <div class="d-flex flex-column align-items-end">
                        <span class="fw-bold"><?= $_SESSION['admin_name']; ?></span>
                        <span class="badge bg-<?= ($_SESSION['admin_role'] == 'super_admin') ? 'danger' : 'secondary'; ?> btn-sm">
                            <?= str_replace('_', ' ', strtoupper($_SESSION['admin_role'])); ?>
                        </span>
                    </div>
                    <div class="avatar">
                        <img src="https://ui-avatars.com/api/?name=<?= urlencode($_SESSION['admin_name'] ?? 'Admin'); ?>&background=0D8ABC&color=fff" alt="Profile">
                    </div>
                </div>
            </a>
        </header>