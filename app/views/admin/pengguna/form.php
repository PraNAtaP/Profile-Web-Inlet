<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3><?= isset($data['admin']) ? 'Edit' : 'Tambah'; ?> Admin</h3>
                </div>
                <div class="card-body">
                    <form action="<?= isset($data['admin']) ? BASEURL . '/pengguna/update' : BASEURL . '/pengguna/simpan'; ?>" method="post">
                        <?php if (isset($data['admin'])) : ?>
                            <input type="hidden" name="id_admin" value="<?= $data['admin']['id_admin']; ?>">
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= isset($data['admin']) ? htmlspecialchars($data['admin']['nama']) : ''; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= isset($data['admin']) ? htmlspecialchars($data['admin']['email']) : ''; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= isset($data['admin']) ? htmlspecialchars($data['admin']['username']) : ''; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" <?= !isset($data['admin']) ? 'required' : ''; ?>>
                            <?php if (isset($data['admin'])) : ?>
                                <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti password.</small>
                            <?php endif; ?>
                        </div>
                        <a href="<?= BASEURL; ?>/pengguna" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
