<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>
    <link rel="icon" type="image/png" href="<?= BASEURL; ?>/img/LOGO-icon.png" />
    <link rel="shortcut icon" href="<?= BASEURL; ?>/img/LOGO-icon.png" />
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <img src="<?= BASEURL; ?>/img/logo-putih.svg" alt="Logo Admin">
        </div>
        <ul class="sidebar-menu">
            <li>
                <a href="<?= BASEURL; ?>/admin/dashboard">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="7" height="7"></rect>
                        <rect x="14" y="3" width="7" height="7"></rect>
                        <rect x="14" y="14" width="7" height="7"></rect>
                        <rect x="3" y="14" width="7" height="7"></rect>
                    </svg>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-label">KONTEN</li>
            <li>
                <a href="<?= BASEURL; ?>/berita">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                        <polyline points="10 9 9 9 8 9"></polyline>
                    </svg>
                    <span>Berita</span>
                </a>
            </li>
            <li>
                <a href="<?= BASEURL; ?>/riset">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M2 22h20"></path>
                        <path d="M13 6l3-3a2.828 2.828 0 1 1 4 4l-3 3"></path>
                        <path d="M6 13l7 7"></path>
                        <path d="M9 21H6a3 3 0 0 1-3-3v-3l12-12"></path>
                    </svg>
                    <span>Riset Activities</span>
                </a>
            </li>
            <li>
                <a href="<?= BASEURL; ?>/produk">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                        <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                        <line x1="12" y1="22.08" x2="12" y2="12"></line>
                    </svg>
                    <span>Produk Lab</span>
                </a>
            </li>
            <li>
                <a href="<?= BASEURL; ?>/partner">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    <span>Media Partner</span>
                </a>
            </li>
            <li>
                <a href="<?= BASEURL; ?>/galeri">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                        <circle cx="8.5" cy="8.5" r="1.5"></circle>
                        <polyline points="21 15 16 10 5 21"></polyline>
                    </svg>
                    <span>Kelola Galeri</span>
                </a>
            </li>
            <li class="menu-label">MANAJEMEN</li>
            <li>
                <a href="<?= BASEURL; ?>/anggota">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    <span>Anggota Lab</span>
                </a>
            </li>
            <?php if (isset($_SESSION['admin_role']) && $_SESSION['admin_role'] == 'super_admin') : ?>
                <li>
                    <a href="<?= BASEURL; ?>/pengguna">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        </svg>
                        <span>Kelola Admin</span>
                    </a>
                </li>
            <?php endif; ?>
            <li>
                <a href="<?= BASEURL; ?>/pesan">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                    <span>Pesan Masuk</span>
                </a>
            </li>
            <li>
                <a href="<?= BASEURL; ?>/log">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                    <span>Activity Log</span>
                </a>
            </li>
        </ul>
        <div class="sidebar-footer">
            <a href="<?= BASEURL; ?>/admin/logout" class="logout-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                    <polyline points="16 17 21 12 16 7"></polyline>
                    <line x1="21" y1="12" x2="9" y2="12"></line>
                </svg>
                <span>Logout</span>
            </a>
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
                        <img
                            src="https://ui-avatars.com/api/?name=<?= urlencode($_SESSION['admin_name'] ?? 'Admin'); ?>&background=0D8ABC&color=fff"
                            alt="Profile"
                            width="40"
                            height="40"
                            style="object-fit: cover; border-radius: 50%;">
                    </div>
                </div>
            </a>
        </header>