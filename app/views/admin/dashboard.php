<main>
            <div class="welcome-card">
                <div class="welcome-text">
                    <h1>Halo, <?= htmlspecialchars($data['admin_name'] ?? 'Admin'); ?>!</h1>
                    <p>Selamat datang di halaman administrasi website. Semangat kerjanya!</p>
                </div>
            </div>

            <div class="stats-container">
                <div class="stat-card green">
                    <div class="card-head">
                        <h3>Visitor Online</h3>
                        <span class="icon">👀</span>
                    </div>
                    <p class="number"><?= htmlspecialchars($data['online_users'] ?? 0); ?></p>
                </div>
                <div class="stat-card blue">
                    <div class="card-head">
                        <h3>Total Berita</h3>
                        <span class="icon">📰</span>
                    </div>
                    <p class="number"><?= htmlspecialchars($data['total_berita'] ?? 0); ?></p>
                </div>

                <div class="stat-card green">
                    <div class="card-head">
                        <h3>Total Galeri</h3>
                        <span class="icon">🖼️</span>
                    </div>
                    <p class="number"><?= htmlspecialchars($data['total_galeri'] ?? 0); ?></p>
                </div>

                <div class="stat-card purple">
                    <div class="card-head">
                        <h3>Total Riset</h3>
                        <span class="icon">🔬</span>
                    </div>
                    <p class="number"><?= htmlspecialchars($data['total_riset'] ?? 0); ?></p>
                </div>

                <div class="stat-card red">
                    <div class="card-head">
                        <h3>Anggota Lab</h3>
                        <span class="icon">👥</span>
                    </div>
                    <p class="number"><?= htmlspecialchars($data['total_anggota'] ?? 0); ?></p>
                </div>

                <div class="stat-card yellow">
                    <div class="card-head">
                        <h3>Produk Lab</h3>
                        <span class="icon">📦</span>
                    </div>
                    <p class="number"><?= htmlspecialchars($data['total_produk'] ?? 0); ?></p>
                </div>

                <div class="stat-card dark-blue">
                    <div class="card-head">
                        <h3>Partner</h3>
                        <span class="icon">🤝</span>
                    </div>
                    <p class="number"><?= htmlspecialchars($data['total_partner'] ?? 0); ?></p>
                </div>

                <div class="stat-card orange">
                    <div class="card-head">
                        <h3>Jumlah Admin</h3>
                        <span class="icon">👑</span>
                    </div>
                    <p class="number"><?= htmlspecialchars($data['total_admin'] ?? 0); ?></p>
                </div>
            </div>
        </main>