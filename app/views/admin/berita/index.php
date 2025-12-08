<div class="container">
    <h1>Kelola Berita</h1>
    <div class="clearfix">
        <a href="<?= BASEURL; ?>/berita/tambah" class="btn btn-add">Tambah Berita</a>
    </div>
    <div class="table-wrapper">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 50px;">No.</th>
                    <th>Judul</th>
                    <th style="width: 150px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($data['berita']) && !empty($data['berita'])): ?>
                    <?php foreach ($data['berita'] as $key => $berita): ?>
                        <tr>
                            <td><?= $key + 1; ?></td>
                            <td><?= htmlspecialchars($berita['judul']); ?></td>
                            <td>
                                <a href="<?= BASEURL; ?>/berita/edit/<?= $berita['id_berita']; ?>" class="btn btn-edit">Edit</a>
                                <a href="<?= BASEURL; ?>/berita/hapus/<?= $berita['id_berita']; ?>" class="btn btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" style="text-align: center;">Tidak ada data berita.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>