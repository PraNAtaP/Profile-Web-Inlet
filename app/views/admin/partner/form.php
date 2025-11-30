<?php
// Logic Pintar: Cek apakah ini mode Edit atau Tambah?
$isEdit = isset($data['partner']) && !empty($data['partner']);
$p = $isEdit ? $data['partner'] : null;

// Tentukan Judul & Link Action
$judulCard = $isEdit ? 'Edit Media Partner' : 'Tambah Media Partner';
$actionURL = $isEdit ? BASEURL . '/partner/update' : BASEURL . '/partner/simpan';
?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0"><?= $judulCard; ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?= $actionURL; ?>" method="post" enctype="multipart/form-data">

                        <?php if ($isEdit): ?>
                            <input type="hidden" name="id_media_partner" value="<?= $p['id_media_partner']; ?>">
                            <input type="hidden" name="logo_lama" value="<?= $p['logo']; ?>">
                        <?php endif; ?>

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Partner</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="<?= $isEdit ? $p['nama'] : ''; ?>" required placeholder="Contoh: Google">
                        </div>

                        <div class="mb-3">
                            <label for="link" class="form-label">Link Website</label>
                            <input type="url" class="form-control" id="link" name="link"
                                value="<?= $isEdit ? $p['link'] : ''; ?>" required placeholder="https://example.com">
                        </div>

                        <div class="mb-3">
                            <label for="logo" class="form-label">Logo Partner</label>

                            <?php if ($isEdit && !empty($p['logo'])): ?>
                                <div class="mb-2">
                                    <img src="<?= BASEURL; ?>/img/partner/<?= $p['logo']; ?>" alt="Preview" width="100" class="img-thumbnail">
                                    <small class="d-block text-muted">Logo saat ini</small>
                                </div>
                            <?php endif; ?>

                            <input type="file" class="form-control" id="logo" name="logo" accept="image/*">
                            <small class="text-muted">Format: JPG, PNG, WEBP. Kosongkan jika tidak ingin mengubah logo.</small>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="<?= BASEURL; ?>/partner" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-success">Simpan Data</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>