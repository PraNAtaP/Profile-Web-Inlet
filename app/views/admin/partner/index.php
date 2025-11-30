<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>🤝 Media Partner</h1>
        <a href="<?= BASEURL; ?>/partner/form" class="btn btn-primary">Tambah Partner</a>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" width="5%">No</th>
                            <th scope="col" width="15%">Logo</th>
                            <th scope="col">Nama Partner</th>
                            <th scope="col">Link Website</th>
                            <th scope="col" width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php if (isset($data['partner']) && !empty($data['partner'])) : ?>
                            <?php foreach ($data['partner'] as $p) : ?>
                                <tr>
                                    <th scope="row" class="text-center"><?= $i++; ?></th>
                                    <td class="text-center">
                                        <img src="<?= BASEURL; ?>/img/partner/<?= $p['logo']; ?>" alt="Logo" width="100" style="object-fit: contain; max-height: 60px;">
                                    </td>
                                    <td><?= htmlspecialchars($p['nama']); ?></td>
                                    <td><a href="<?= $p['link']; ?>" target="_blank" class="text-decoration-none">Kunjungi ↗</a></td>
                                    <td class="text-center">
                                        <a href="<?= BASEURL; ?>/partner/edit/<?= $p['id_media_partner']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?= BASEURL; ?>/partner/hapus/<?= $p['id_media_partner']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus partner ini?');">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="5" class="text-center">Belum ada media partner.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>