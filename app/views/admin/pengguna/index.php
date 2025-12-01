<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-12">
            <h1>Kelola Admin</h1>
            <a href="<?= BASEURL; ?>/pengguna/tambah" class="btn btn-primary mt-2">
                <i class="fas fa-plus-circle"></i> Tambah Admin Baru
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($data['admin'] as $admin) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= htmlspecialchars($admin['nama']); ?></td>
                                    <td><?= htmlspecialchars($admin['username']); ?></td>
                                    <td><?= htmlspecialchars($admin['email']); ?></td>
                                    <td>
                                        <a href="<?= BASEURL; ?>/pengguna/edit/<?= $admin['id_admin']; ?>" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <?php if ($admin['id_admin'] != $_SESSION['admin_id']) : ?>
                                            <a href="<?= BASEURL; ?>/pengguna/hapus/<?= $admin['id_admin']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus admin ini?');">
                                                <i class="fas fa-trash"></i> Hapus
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
