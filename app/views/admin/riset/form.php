<?php
$isEdit = isset($data['riset']);
$actionUrl = $isEdit ? BASEURL . '/riset/update' : BASEURL . '/riset/simpan';
?>
<div class="container-fluid">
    <div class="form-container">
        <h2 class="form-title"><?= $data['judul']; ?></h2>
        <form action="<?= $actionUrl; ?>" method="post" enctype="multipart/form-data">
            <?php if ($isEdit): ?>
                <input type="hidden" name="id_riset" value="<?= $data['riset']['id_riset']; ?>">
            <?php endif; ?>
            <div class="form-group">
                <label for="judul_riset">Judul Riset</label>
                <input type="text" class="form-control" id="judul_riset" name="judul_riset" value="<?= $isEdit ? htmlspecialchars($data['riset']['judul_riset']) : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="peneliti">Peneliti</label>
                <input type="text" class="form-control" id="peneliti" name="peneliti" value="<?= $isEdit ? htmlspecialchars($data['riset']['peneliti']) : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" required><?= $isEdit ? htmlspecialchars($data['riset']['deskripsi']) : ''; ?></textarea>
            </div>
            <div class="form-group">
                <label for="video_embed">Link YouTube</label>
                <input type="text" class="form-control" id="video_embed" name="video_embed" value="<?= $isEdit ? htmlspecialchars($data['riset']['video_embed']) : ''; ?>" placeholder="Contoh: https://www.youtube.com/watch?v=xxxxx">
            </div>
            <div class="form-group">
                <label for="file_dokumen">Upload Thumbnail</label>
                <input type="file" class="form-control" id="file_dokumen" name="file_dokumen" accept="image/*" onchange="previewImage()">
                <?php if ($isEdit && !empty($data['riset']['file_dokumen'])): ?>
                    <div class="file-info">Thumbnail saat ini: <?= htmlspecialchars($data['riset']['file_dokumen']); ?></div>
                    <img id="img-preview" class="image-preview" src="<?= BASEURL; ?>/img/riset/<?= $data['riset']['file_dokumen']; ?>" alt="Preview">
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
        const image = document.querySelector('#file_dokumen');
        const imgPreview = document.querySelector('#img-preview');
        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
