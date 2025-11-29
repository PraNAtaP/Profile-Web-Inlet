<style>
    .container-fluid {
        padding: 2rem;
    }
    .form-container {
        background-color: #fff;
        padding: 2.5rem;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        max-width: 800px;
        margin: 0 auto;
    }
    .form-title {
        margin-bottom: 2rem;
        font-size: 1.8rem;
        color: #333;
        text-align: center;
    }
    .form-group {
        margin-bottom: 1.5rem;
    }
    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: #495057;
    }
    .form-control {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ced4da;
        border-radius: 4px;
        font-size: 1rem;
        transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }
    .form-control:focus {
        border-color: #80bdff;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
    }
    textarea.form-control {
        min-height: 120px;
        resize: vertical;
    }
    .btn-submit {
        background-color: #007bff;
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 500;
        border: none;
        cursor: pointer;
        font-size: 1rem;
        transition: background-color 0.3s ease;
        width: 100%;
    }
    .btn-submit:hover {
        background-color: #0056b3;
    }
    .file-info {
        font-size: 0.9rem;
        color: #6c757d;
        margin-top: 0.5rem;
    }
    .image-preview {
        max-width: 200px;
        margin-top: 1rem;
        border-radius: 5px;
        border: 1px solid #ddd;
        padding: 5px;
    }
</style>

<?php
$isEdit = isset($data['riset']);
$actionUrl = $isEdit ? BASEURL . '/riset/ubah/' . $data['riset']['id_riset'] : BASEURL . '/riset/simpan';
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
