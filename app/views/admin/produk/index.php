<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>📦 Produk Lab</h1>
        <a href="<?= BASEURL; ?>/produk/tambah" class="btn btn-primary">Tambah Produk</a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" width="5%">No</th>
                            <th scope="col" width="15%">Gambar</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Link</th>
                            <th scope="col" width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php if (isset($data['produk']) && !empty($data['produk'])) : ?>
                            <?php foreach ($data['produk'] as $p) : ?>
                                <tr>
                                    <th scope="row" class="text-center"><?= $i++; ?></th>
                                    <td class="text-center">
                                        <img src="<?= BASEURL; ?>/img/produk/<?= $p['gambar']; ?>" alt="Thumb" width="80" height="80" style="border-radius: 5px; object-fit: cover; border: 1px solid #ddd;">
                                    </td>
                                    <td><?= htmlspecialchars($p['judul']); ?></td>
                                    <td><a href="<?= $p['link']; ?>" target="_blank" class="text-decoration-none">Buka Link ↗</a></td>
                                    <td class="text-center">
                                        <a href="<?= BASEURL; ?>/produk/edit/<?= $p['id_produk']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?= BASEURL; ?>/produk/hapus/<?= $p['id_produk']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus produk ini?');">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="5" class="text-center">Belum ada data produk.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>