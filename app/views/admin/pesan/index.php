<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">📨 Pesan Masuk</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="pesan-table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">No</th>
                                    <th>Waktu</th>
                                    <th>Pengirim</th>
                                    <th>IP Address</th>
                                    <th>Isi Pesan</th>
                                    <th style="width: 80px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($data['pesan']) && !empty($data['pesan'])): ?>
                                    <?php $no = 1; ?>
                                    <?php foreach ($data['pesan'] as $pesan): ?>
                                        <tr>
                                            <td><?= $no++; ?>.</td>
                                            <td><?= date('d M Y, H:i', strtotime($pesan['waktu_kirim'])); ?></td>
                                            <td>
                                                <strong><?= htmlspecialchars($pesan['nama']); ?></strong><br>
                                                <small><?= htmlspecialchars($pesan['email']); ?></small>
                                            </td>
                                            <td><?= htmlspecialchars($pesan['ip_address']); ?></td>
                                            <td><?= nl2br(htmlspecialchars($pesan['pesan'])); ?></td>
                                            <td>
                                                <a href="<?= BASEURL; ?>/pesan/hapus/<?= $pesan['id_form']; ?>"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus pesan ini?');">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada pesan masuk.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Font Awesome for icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>