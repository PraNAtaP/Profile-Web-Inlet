<div class="container">
    <h1>Manajemen Anggota Lab</h1>

    <div class="clearfix">
        <a href="<?= BASEURL; ?>/anggota/tambah" class="btn btn-add">Tambah Anggota</a>
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 50px;">No.</th>
                    <th style="width: 100px;">Foto</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Kontak</th>
                    <th style="width: 150px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($data['anggota']) && !empty($data['anggota'])): ?>
                    <?php foreach ($data['anggota'] as $key => $agt): ?>
                        <tr>
                            <td><?= $key + 1; ?></td>
                            <td>
                                <?php if (!empty($agt['foto'])): ?>
                                    <img src="<?= BASEURL; ?>/img/anggota/<?= $agt['foto']; ?>" alt="Foto <?= htmlspecialchars($agt['nama']); ?>" style="width: 60px; height: 60px; object-fit: cover; border-radius: 50%;">
                                <?php else: ?>
                                    <img src="https://ui-avatars.com/api/?name=<?= urlencode($agt['nama']); ?>&background=random" alt="Avatar" style="width: 60px; height: 60px; border-radius: 50%;">
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($agt['nama']); ?></td>
                            <td><?= htmlspecialchars($agt['jabatan']); ?></td>
                            <td><?= htmlspecialchars($agt['kontak']); ?></td>
                            <td>
                                <a href="<?= BASEURL; ?>/anggota/edit/<?= $agt['id_anggota']; ?>" class="btn btn-edit">Edit</a>
                                <a href="<?= BASEURL; ?>/anggota/hapus/<?= $agt['id_anggota']; ?>" class="btn btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" style="text-align: center;">Tidak ada data anggota.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
