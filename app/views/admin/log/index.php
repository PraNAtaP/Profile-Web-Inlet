<style>
    .content-area {
        padding: 20px 40px 60px 40px;
        background-color: #f8f9fa;
        min-height: 100vh;
    }

    .table-wrapper {
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        border: 2px solid #334eac;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table thead {
        background-color: #334eac;
        color: white;
    }

    .table th {
        padding: 20px 25px;
        text-align: left;
        font-weight: 600;
        letter-spacing: 0.5px;
        font-size: 0.95rem;
        border-right: 1px solid rgba(255, 255, 255, 0.15);
        vertical-align: middle;
    }

    .table th:last-child {
        border-right: none;
    }

    .table td {
        padding: 18px 25px;
        vertical-align: middle;
        color: #2c3e50;
        border-bottom: 1px solid #d1d5db;
        border-right: 1px solid #e5e7eb;
        font-size: 0.9rem;
    }

    .table td:last-child {
        border-right: none;
    }

    .table tbody tr:last-child td {
        border-bottom: none;
    }

    .table tbody tr:hover {
        background-color: #f0f4ff;
    }

    .col-no {
        font-weight: 800;
        color: #334eac;
        text-align: center;
    }

    .log-date {
        font-family: 'Consolas', 'Monaco', monospace;
        color: #64748b;
        font-weight: 600;
        background: #f1f5f9;
        padding: 4px 8px;
        border-radius: 4px;
        display: inline-block;
    }

    .admin-name {
        font-weight: 700;
        color: #1e293b;
    }

    .badge-log {
        padding: 6px 12px;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: inline-block;
        min-width: 80px;
        text-align: center;
    }

    .badge-add {
        background-color: rgba(39, 174, 96, 0.15);
        color: #27ae60;
    }

    .badge-update {
        background-color: rgba(241, 196, 15, 0.15);
        color: #d35400;
    }

    .badge-delete {
        background-color: rgba(192, 57, 43, 0.15);
        color: #c0392b;
    }

    .badge-default {
        background-color: #e2e8f0;
        color: #475569;
    }
</style>

<div class="content-area">
    <div class="table-wrapper">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 70px; text-align: center;">No.</th>
                    <th style="width: 200px;">Waktu</th>
                    <th style="width: 200px;">Admin</th>
                    <th style="width: 150px; text-align: center;">Aksi</th>
                    <th>Deskripsi Aktivitas</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($data['logs'] as $log) : ?>
                    <tr>
                        <td class="col-no"><?= sprintf("%02d", $i++); ?>.</td>
                        <td>
                            <span class="log-date">
                                <?= date('d M Y H:i', strtotime($log['waktu'])); ?>
                            </span>
                        </td>
                        <td>
                            <span class="admin-name">
                                <?= htmlspecialchars($log['admin_nama']); ?>
                            </span>
                        </td>
                        <td style="text-align: center;">
                            <?php
                            $badge_class = 'badge-default';
                            if ($log['aksi'] == 'TAMBAH') {
                                $badge_class = 'badge-add';
                            } elseif ($log['aksi'] == 'UPDATE') {
                                $badge_class = 'badge-update';
                            } elseif ($log['aksi'] == 'HAPUS') {
                                $badge_class = 'badge-delete';
                            }
                            ?>
                            <span class="badge-log <?= $badge_class; ?>">
                                <?= htmlspecialchars($log['aksi']); ?>
                            </span>
                        </td>
                        <td style="line-height: 1.6; color: #475569;">
                            <?= htmlspecialchars($log['deskripsi']); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>