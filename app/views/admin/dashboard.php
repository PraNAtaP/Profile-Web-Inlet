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
        <div class="stat-card orange">
            <div class="card-head">
                <h3>Partner</h3>
                <span class="icon">🤝</span>
            </div>
            <p class="number"><?= htmlspecialchars($data['total_partner'] ?? 0); ?></p>
        </div>
    </div>
    <!-- Visitor Analytics Card -->
    <div class="analytics-card">
        <div class="card-header">
            <h4>Analisis Pengunjung</h4>
            <p>Data 12 bulan terakhir</p>
        </div>
        <div class="card-body">
            <?php
            $visitorStats = $data['visitor_stats'];
            $totalVisitors = $visitorStats['total'] ?? 0;
            $monthlyData = $visitorStats['data'] ?? [];
            $averageVisitors = count($monthlyData) > 0 ? round($totalVisitors / count($monthlyData)) : 0;
            $trendText = 'N/A';
            $trendIcon = '';
            $trendColor = '';
            $lastMonthVisitors = count($monthlyData) > 0 ? end($monthlyData) : 0;
            $prevMonthVisitors = count($monthlyData) > 1 ? prev($monthlyData) : 0;
            if ($prevMonthVisitors > 0) {
                $percentageChange = (($lastMonthVisitors - $prevMonthVisitors) / $prevMonthVisitors) * 100;
                if ($percentageChange > 0) {
                    $trendText = 'Naik ' . round($percentageChange, 1) . '%';
                    $trendIcon = '▲'; 
                    $trendColor = 'green';
                } elseif ($percentageChange < 0) {
                    $trendText = 'Turun ' . round(abs($percentageChange), 1) . '%';
                    $trendIcon = '▼'; 
                    $trendColor = 'red';
                } else {
                    $trendText = 'Stabil';
                    $trendIcon = '●';
                    $trendColor = 'grey';
                }
            } elseif ($lastMonthVisitors > 0) {
                $trendText = 'Data baru';
                $trendIcon = '✨';
                $trendColor = 'blue';
            }
            ?>
            <div class="main-stats">
                <div class="stat-item">
                    <span>Total Visitor (12 Bulan)</span>
                    <strong><?= htmlspecialchars($totalVisitors); ?></strong>
                </div>
                <div class="stat-item">
                    <span>Rata-rata per Bulan</span>
                    <strong><?= htmlspecialchars($averageVisitors); ?></strong>
                </div>
            </div>
            <div class="chart-area">
                <canvas id="visitorChart"></canvas>
            </div>
        </div>
        <div class="card-footer">
            <span style="color: <?= $trendColor; ?>;"><?= $trendIcon; ?></span>
            <p>Bulan ini <strong><?= $trendText; ?></strong> dibanding bulan sebelumnya.</p>
        </div>
    </div>
</main>