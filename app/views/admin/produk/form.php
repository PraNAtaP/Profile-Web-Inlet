<?php
$is_edit = isset($data['produk']);
?>
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-8">
            <!-- Dynamically set the title for the page -->
            <h1><?= $is_edit ? 'Edit' : 'Tambah'; ?> Produk Lab</h1>
            <!-- The form action will point to /produk/update for edits and /produk/simpan for new entries -->
            <form action="<?= BASEURL; ?>/produk/<?= $is_edit ? 'update' : 'simpan'; ?>" method="post" enctype="multipart/form-data">
                <?php if ($is_edit) : ?>
                    <!-- For edits, include hidden fields for the ID and the old image name -->
                    <input type="hidden" name="id_produk" value="<?= htmlspecialchars($data['produk']['id_produk']); ?>">
                    <input type="hidden" name="gambar_lama" value="<?= htmlspecialchars($data['produk']['gambar']); ?>">
                <?php endif; ?>
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="<?= $is_edit ? htmlspecialchars($data['produk']['judul']) : ''; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="link" class="form-label">Link</label>
                    <input type="url" class="form-control" id="link" name="link" value="<?= $is_edit ? htmlspecialchars($data['produk']['link']) : ''; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required><?= $is_edit ? htmlspecialchars($data['produk']['deskripsi']) : ''; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar <?= $is_edit ? '(Opsional, ganti jika perlu)' : ''; ?></label>
                    <input class="form-control" type="file" id="gambar" name="gambar" accept="image/*">
                    <?php if ($is_edit && !empty($data['produk']['gambar'])) : ?>
                        <!-- If editing, show a preview of the current image -->
                        <div class="mt-2">
                            <p>Gambar saat ini:</p>
                            <img src="<?= BASEURL; ?>/img/produk/<?= htmlspecialchars($data['produk']['gambar']); ?>" width="150" alt="Gambar Produk Saat Ini">
                        </div>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= BASEURL; ?>/produk" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>