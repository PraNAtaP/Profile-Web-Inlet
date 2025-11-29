<style>
    .container-fluid { padding: 2rem; }
    .form-container { background-color: #fff; padding: 2.5rem; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); max-width: 800px; margin: 0 auto; }
    .form-title { margin-bottom: 2rem; font-size: 1.8rem; color: #333; text-align: center; }
    .form-group { margin-bottom: 1.5rem; }
    .form-group label { display: block; margin-bottom: 0.5rem; font-weight: 600; color: #495057; }
    .form-control { width: 100%; padding: 0.75rem; border: 1px solid #ced4da; border-radius: 4px; font-size: 1rem; }
    textarea.form-control { min-height: 120px; resize: vertical; }
    .btn-submit { background-color: #007bff; color: white; padding: 0.75rem 1.5rem; border-radius: 5px; text-decoration: none; font-weight: 500; border: none; cursor: pointer; font-size: 1rem; width: 100%; }
    .file-info { font-size: 0.9rem; color: #6c757d; margin-top: 0.5rem; }
    .image-preview { max-width: 200px; margin-top: 1rem; border-radius: 5px; border: 1px solid #ddd; padding: 5px; }
</style>

<?php
$isEdit = isset($data['galeri']);
$actionUrl = $isEdit ? BASEURL . '/galeri/update' : BASEURL . '/galeri/simpan';
?>

<div class="container-fluid">
    <div class="form-container">
        <h2 class="form-title"><?= $data['judul']; ?></h2>

        <form action="<?= $actionUrl; ?>" method="post" enctype="multipart/form-data">
            <?php if ($isEdit): ?>
                <input type="hidden" name="id_galeri" value="<?= $data['galeri']['id_galeri']; ?>">
            <?php endif; ?>

            <div class="form-group">
                <label for="judul">Judul Foto</label>
                <input type="text" class="form-control" id="judul" name="judul" value="<?= $isEdit ? htmlspecialchars($data['galeri']['judul']) : ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" required><?= $isEdit ? htmlspecialchars($data['galeri']['deskripsi']) : ''; ?></textarea>
            </div>

            <div class="form-group">
                <label for="video_embed">Link Video (Opsional)</label>
                <input type="text" class="form-control" id="video_embed" name="video_embed" value="<?= $isEdit ? htmlspecialchars($data['galeri']['video_embed']) : ''; ?>" placeholder="Contoh: https://www.youtube.com/watch?v=xxxxx">
            </div>

            <div class="form-group">
                <label for="foto">Upload Foto</label>
                <input type="file" class="form-control" id="foto" name="foto" accept="image/*" onchange="previewImage()" <?= !$isEdit ? 'required' : '' ?>>
                <?php if ($isEdit && !empty($data['galeri']['foto'])): ?>
                    <div class="file-info">Foto saat ini:</div>
                    <img id="img-preview" class="image-preview" src="<?= BASEURL; ?>/img/galeri/<?= $data['galeri']['foto']; ?>" alt="Preview">
                <?php else: ?>
                    <img id="img-preview" class="image-preview" style="display: none;" alt="Preview">
                <?php endif; ?>
            </div>

            <div class="form-group">
                <button type="submit" class="btn-submit"><?= $isEdit ? 'Update Data' : 'Tambah Data'; ?></button>
            </div>
        </form>
    </div>
</div>

<script>
    function previewImage() {
        const image = document.querySelector('#foto');
        const imgPreview = document.querySelector('#img-preview');

        if(image.files[0]) {
            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    }
</script>
