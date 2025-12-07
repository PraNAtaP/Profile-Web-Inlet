<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $data['judul']; ?></h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Aktivitas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th style="width: 20%;">Waktu</th>
                            <th style="width: 15%;">Admin</th>
                            <th style="width: 10%;">Aksi</th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($data['logs'] as $log) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= date('d M Y H:i', strtotime($log['waktu'])); ?></td>
                                <td><?= htmlspecialchars($log['admin_nama']); ?></td>
                                <td>
                                    <?php
                                    $badge_class = 'badge-secondary';
                                    if ($log['aksi'] == 'TAMBAH') {
                                        $badge_class = 'badge-success';
                                    } elseif ($log['aksi'] == 'UPDATE') {
                                        $badge_class = 'badge-warning';
                                    } elseif ($log['aksi'] == 'HAPUS') {
                                        $badge_class = 'badge-danger';
                                    }
                                    ?>
                                    <span class="badge <?= $badge_class; ?>"><?= htmlspecialchars($log['aksi']); ?></span>
                                </td>
                                <td><?= htmlspecialchars($log['deskripsi']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
