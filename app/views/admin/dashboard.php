<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul; ?></title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/dashboard.css">
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h3>Admin Panel</h3>
        </div>
        <ul class="nav-menu">
            <li><a href="<?= BASEURL; ?>/../admin">Dashboard</a></li>
            <li><a href="#">Kelola Berita</a></li>
            <li><a href="#">Kelola Galeri</a></li>
            <li><a href="#">Kelola Riset</a></li>
            <li><a href="#">Anggota Lab</a></li>
            <li><a href="<?= BASEURL; ?>/../admin/logout" class="logout">Logout</a></li>
        </ul>
    </div>
    <div class="main-content">
        <header>
            <h2>Dashboard</h2>
        </header>
        <main>
            <div class="welcome-card">
                <h1>Halo, <?= htmlspecialchars($admin_name); ?>!</h1>
                <p>Selamat datang di halaman administrasi website.</p>
            </div>

            <div class="stats-container">
                <div class="stat-card">
                    <h3>Total Berita</h3>
                    <p>0</p>
                </div>
                <div class="stat-card">
                    <h3>Total Galeri</h3>
                    <p>0</p>
                </div>
                <div class="stat-card">
                    <h3>Total Riset</h3>
                    <p>0</p>
                </div>
                 <div class="stat-card">
                    <h3>Jumlah Anggota</h3>
                    <p>0</p>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
