        <header>
            <h2>Dashboard</h2>
            <div class="user-info">
                <span>Halo, <b><?= htmlspecialchars($data['admin_name'] ?? 'Admin'); ?></b></span>
                <div class="avatar">
                    <img src="https://ui-avatars.com/api/?name=<?= urlencode($data['admin_name'] ?? 'Admin'); ?>&background=0D8ABC&color=fff" alt="Profile">
                </div>
            </div>
        </header>

        <main>
            <div class="welcome-card">
                <div class="welcome-text">
                    <h1>Halo, <?= htmlspecialchars($data['admin_name'] ?? 'Admin'); ?>!</h1>
                    <p>Selamat datang di halaman administrasi website. Semangat kerjanya!</p>
                </div>
            </div>

            <div class="stats-container">
                <div class="stat-card blue">
                    <div class="card-head">
                        <h3>Total Berita</h3>
                        <span class="icon">📰</span>
                    </div>
                    <p class="number"><?= htmlspecialchars($data['total_berita']); ?></p>
                </div>

                <div class="stat-card green">
                    <div class="card-head">
                        <h3>Total Galeri</h3>
                        <span class="icon">🖼️</span>
                    </div>
                    <p class="number"><?= htmlspecialchars($data['total_galeri']); ?></p>
                </div>

                <div class="stat-card purple">
                    <div class="card-head">
                        <h3>Total Riset</h3>
                        <span class="icon">🔬</span>
                    </div>
                    <p class="number"><?= htmlspecialchars($data['total_riset']); ?></p>
                </div>

                <div class="stat-card red">
                    <div class="card-head">
                        <h3>Jumlah Anggota Lab</h3>
                        <span class="icon">👥</span>
                    </div>
                    <p class="number"><?= htmlspecialchars($data['total_anggota']); ?></p>
                </div>

                <div class="stat-card orange">
                    <div class="card-head">
                        <h3>Jumlah Admin</h3>
                        <span class="icon">👥</span>
                    </div>
                    <p class="number"><?= htmlspecialchars($data['total_anggota']); ?></p>
                </div>
            </div>
        </main>