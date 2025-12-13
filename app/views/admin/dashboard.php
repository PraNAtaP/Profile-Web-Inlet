<style>
    main {
        padding: 30px 40px;
        background-color: #f8f9fa;
        min-height: 100vh;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .welcome-card {
        background: url('<?= BASEURL; ?>/img/dashboard-bg.svg') no-repeat center center;
        background-size: cover;
        border-radius: 16px;
        padding: 60px 40px;
        color: white;
        margin-bottom: 35px;
        box-shadow: 0 10px 30px rgba(30, 58, 138, 0.3);
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
    }

    .welcome-text {
        position: relative;
        z-index: 2;
        max-width: 800px;
    }

    .welcome-text h1 {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 12px;
        letter-spacing: 0.5px;
    }

    .welcome-text p {
        font-size: 1.1rem;
        opacity: 0.9;
        line-height: 1.6;
        font-weight: 400;
    }

    .stats-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 25px;
        margin-bottom: 35px;
    }

    .stat-card {
        background: #fff;
        border-radius: 16px;
        padding: 25px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02);
        border: 1px solid #f1f5f9;
        transition: transform 0.2s, box-shadow 0.2s;
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.08);
        border-color: #334eac;
    }

    .icon-box {
        width: 70px;
        height: 70px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        flex-shrink: 0;
        background-color: #334eac;
        color: #ffffffff;
    }

    .stat-info {
        display: flex;
        flex-direction: column;
    }

    .stat-label {
        font-size: 0.85rem;
        color: #94a3b8;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 5px;
    }

    .stat-value {
        font-size: 2rem;
        font-weight: 800;
        color: #1e293b;
        line-height: 1;
    }

    .analytics-section {
        background: #fff;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02);
        border: 1px solid #f1f5f9;
    }

    .analytics-header {
        margin-bottom: 30px;
    }

    .analytics-header h4 {
        font-size: 1.3rem;
        font-weight: 800;
        color: #1e293b;
        margin-bottom: 5px;
    }

    .analytics-header p {
        color: #64748b;
        font-size: 0.95rem;
    }

    .chart-wrapper {
        position: relative;
        height: 350px;
        width: 100%;
    }

    .summary-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 30px;
        margin-bottom: 30px;
        padding-bottom: 30px;
        border-bottom: 1px solid #f1f5f9;
    }

    .summary-item label {
        display: block;
        font-size: 0.9rem;
        color: #64748b;
        margin-bottom: 5px;
    }

    .summary-item h2 {
        font-size: 1.8rem;
        font-weight: 800;
        color: #1e293b;
        margin: 0;
    }
</style>

<main>
    <div class="welcome-card">
        <div class="welcome-text">
            <h1>Hi, <?= htmlspecialchars($data['admin_name'] ?? 'Admin'); ?>!</h1>
            <p>Selamat datang kembali di dashboard admin. Kelola konten dan pantau perkembangan website dengan mudah hari ini.</p>
        </div>
    </div>

    <div class="stats-container">
        <div class="stat-card">
            <div class="icon-box">
                <i class="fa-solid fa-eye"></i>
            </div>
            <div class="stat-info">
                <span class="stat-label">Visitor Online</span>
                <span class="stat-value"><?= htmlspecialchars($data['online_users'] ?? 0); ?></span>
            </div>
        </div>

        <div class="stat-card">
            <div class="icon-box">
                <i class="fa-solid fa-newspaper"></i>
            </div>
            <div class="stat-info">
                <span class="stat-label">Total Berita</span>
                <span class="stat-value"><?= htmlspecialchars($data['total_berita'] ?? 0); ?></span>
            </div>
        </div>

        <div class="stat-card">
            <div class="icon-box">
                <i class="fa-solid fa-flask"></i>
            </div>
            <div class="stat-info">
                <span class="stat-label">Total Riset</span>
                <span class="stat-value"><?= htmlspecialchars($data['total_riset'] ?? 0); ?></span>
            </div>
        </div>

        <div class="stat-card">
            <div class="icon-box">
                <i class="fa-solid fa-users"></i>
            </div>
            <div class="stat-info">
                <span class="stat-label">Anggota Lab</span>
                <span class="stat-value"><?= htmlspecialchars($data['total_anggota'] ?? 0); ?></span>
            </div>
        </div>

        <div class="stat-card">
            <div class="icon-box">
                <i class="fa-solid fa-box-open"></i>
            </div>
            <div class="stat-info">
                <span class="stat-label">Produk Lab</span>
                <span class="stat-value"><?= htmlspecialchars($data['total_produk'] ?? 0); ?></span>
            </div>
        </div>

        <div class="stat-card">
            <div class="icon-box">
                <i class="fa-solid fa-handshake"></i>
            </div>
            <div class="stat-info">
                <span class="stat-label">Partner</span>
                <span class="stat-value"><?= htmlspecialchars($data['total_partner'] ?? 0); ?></span>
            </div>
        </div>

        <div class="stat-card">
            <div class="icon-box">
                <i class="fa-solid fa-images"></i>
            </div>
            <div class="stat-info">
                <span class="stat-label">Total Galeri</span>
                <span class="stat-value"><?= htmlspecialchars($data['total_galeri'] ?? 0); ?></span>
            </div>
        </div>
    </div>

    <div class="analytics-section">
        <div class="analytics-header">
            <h4>Grafik Pengunjung</h4>
            <p>Statistik kunjungan website 12 bulan terakhir</p>
        </div>

        <div class="summary-grid">
            <?php
            $visitorStats = $data['visitor_stats'];
            $totalVisitors = $visitorStats['total'] ?? 0;
            $monthlyData = $visitorStats['data'] ?? [];
            $labels = array_keys($monthlyData);
            $values = array_values($monthlyData);
            $averageVisitors = count($monthlyData) > 0 ? round($totalVisitors / count($monthlyData)) : 0;
            ?>
            <div class="summary-item">
                <label>Total Pengunjung (Tahun Ini)</label>
                <h2><?= number_format($totalVisitors); ?></h2>
            </div>
            <div class="summary-item">
                <label>Rata-rata per Bulan</label>
                <h2><?= number_format($averageVisitors); ?></h2>
            </div>
        </div>

        <div class="chart-wrapper">
            <canvas id="visitorChart"></canvas>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const labels = <?= json_encode($labels); ?>;
        const dataValues = <?= json_encode($values); ?>;

        const ctx = document.getElementById('visitorChart').getContext('2d');

        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(59, 130, 246, 0.5)');
        gradient.addColorStop(1, 'rgba(59, 130, 246, 0.0)');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Pengunjung',
                    data: dataValues,
                    borderColor: '#3b82f6',
                    backgroundColor: gradient,
                    borderWidth: 3,
                    pointBackgroundColor: '#ffffff',
                    pointBorderColor: '#3b82f6',
                    pointBorderWidth: 2,
                    pointRadius: 6,
                    pointHoverRadius: 8,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: '#1e293b',
                        padding: 12,
                        titleFont: {
                            size: 14
                        },
                        bodyFont: {
                            size: 14,
                            weight: 'bold'
                        },
                        cornerRadius: 8,
                        displayColors: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#f1f5f9',
                            borderDash: [5, 5]
                        },
                        ticks: {
                            color: '#94a3b8',
                            font: {
                                family: 'Segoe UI'
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: '#64748b',
                            font: {
                                family: 'Segoe UI'
                            }
                        }
                    }
                }
            }
        });
    });
</script>