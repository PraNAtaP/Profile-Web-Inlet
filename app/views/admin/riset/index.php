<style>
    .content-area {
        padding: 30px 40px;
        background-color: #f1f5f9;
        min-height: 100vh;
    }

    .top-action-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    .section-title {
        font-size: 1.5rem;
        font-weight: 800;
        color: #1e293b;
    }

    .btn-add-riset {
        background-color: #27ae60;
        color: white;
        padding: 12px 24px;
        border-radius: 8px;
        font-weight: 700;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border: none;
        box-shadow: 0 4px 10px rgba(39, 174, 96, 0.2);
        transition: transform 0.2s;
        cursor: pointer;
    }

    .btn-add-riset:hover {
        background-color: #219150;
        transform: translateY(-2px);
    }

    .riset-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 25px;
    }

    .riset-card {
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02);
        border: 1px solid #e2e8f0;
        transition: transform 0.2s, box-shadow 0.2s;
        display: flex;
        flex-direction: column;
    }

    .riset-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        border-color: #334eac;
    }

    .video-thumb-wrapper {
        position: relative;
        width: 100%;
        padding-top: 56.25%;
        background: #e2e8f0;
        overflow: hidden;
    }

    .video-thumb-img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .riset-body {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .riset-title {
        font-size: 1.1rem;
        font-weight: 800;
        color: #1e293b;
        margin-bottom: 5px;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .riset-desc {
        font-size: 0.9rem;
        color: #64748b;
        margin-bottom: 15px;
        line-height: 1.6;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .riset-actions {
        display: flex;
        gap: 8px;
        margin-top: auto;
    }

    .btn-action {
        flex: 1;
        padding: 8px;
        border-radius: 6px;
        font-size: 0.8rem;
        font-weight: 700;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 4px;
        transition: 0.2s;
        border: none;
        white-space: nowrap;
        cursor: pointer;
    }

    .btn-edit-riset {
        background-color: #27ae60;
        color: white;
        max-width: 80px;
    }

    .btn-edit-riset:hover {
        background-color: #219150;
    }

    .btn-delete-riset {
        background-color: #ef4444;
        color: white;
        max-width: 80px;
    }

    .btn-delete-riset:hover {
        background-color: #dc2626;
    }

    .btn-watch {
        background-color: #334eac;
        color: white;
        flex-grow: 2;
    }

    .btn-watch:hover {
        background-color: #1e3a8a;
    }

    .empty-state {
        grid-column: 1 / -1;
        text-align: center;
        padding: 60px;
        color: #94a3b8;
        background: white;
        border-radius: 12px;
        border: 2px dashed #e2e8f0;
    }

    .modal-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1000;
        justify-content: center;
        align-items: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .modal-overlay.show {
        display: flex;
        opacity: 1;
    }

    .modal-container {
        background-color: #fff;
        padding: 30px;
        border-radius: 16px;
        width: 100%;
        max-width: 600px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        position: relative;
        transform: translateY(-20px);
        transition: transform 0.3s ease;
        max-height: 90vh;
        overflow-y: auto;
    }

    .modal-overlay.show .modal-container {
        transform: translateY(0);
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        border-bottom: 2px solid #f1f5f9;
        padding-bottom: 15px;
    }

    .modal-title {
        font-size: 1.5rem;
        font-weight: 800;
        color: #334eac;
        margin: 0;
    }

    .modal-close {
        background: none;
        border: none;
        font-size: 1.5rem;
        color: #94a3b8;
        cursor: pointer;
        transition: color 0.2s;
    }

    .modal-close:hover {
        color: #ef4444;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #475569;
    }

    .form-control {
        width: 100%;
        padding: 12px;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        font-size: 0.95rem;
        transition: border-color 0.2s;
    }

    .form-control:focus {
        border-color: #334eac;
        outline: none;
        box-shadow: 0 0 0 3px rgba(51, 78, 172, 0.1);
    }

    textarea.form-control {
        resize: vertical;
        min-height: 100px;
    }

    .image-preview-container {
        margin-top: 10px;
        padding: 10px;
        border: 1px dashed #cbd5e1;
        border-radius: 8px;
        text-align: center;
        background: #f8fafc;
        display: none;
    }

    .image-preview-img {
        max-width: 100%;
        max-height: 150px;
        object-fit: contain;
        border-radius: 4px;
    }

    .modal-footer {
        margin-top: 30px;
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        border-top: 2px solid #f1f5f9;
        padding-top: 20px;
    }

    .btn-modal-cancel {
        background-color: #e2e8f0;
        color: #475569;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 600;
        border: none;
        cursor: pointer;
    }

    .btn-modal-save {
        background-color: #334eac;
        color: white;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        box-shadow: 0 4px 10px rgba(51, 78, 172, 0.2);
    }

    .btn-modal-save:hover {
        background-color: #1e3a8a;
    }
</style>

<div class="content-area">
    <div class="top-action-bar">
        <button class="btn-add-riset" onclick="openModal('add')">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            Add Video Research
        </button>
    </div>

    <div class="riset-grid">
        <?php if (isset($data['riset']) && !empty($data['riset'])) : ?>
            <?php foreach ($data['riset'] as $riset) : ?>
                <div class="riset-card">
                    <div class="video-thumb-wrapper">
                        <?php if (!empty($riset['file_dokumen'])): ?>
                            <img src="<?= BASEURL; ?>/img/riset/<?= htmlspecialchars($riset['file_dokumen']); ?>" alt="Thumb" class="video-thumb-img">
                        <?php else: ?>
                            <img src="https://placehold.co/600x400/e2e8f0/64748b?text=No+Thumbnail" alt="No Thumb" class="video-thumb-img">
                        <?php endif; ?>
                    </div>

                    <div class="riset-body">
                        <div class="riset-title"><?= htmlspecialchars($riset['judul_riset']); ?></div>

                        <div class="riset-desc"><?= htmlspecialchars($riset['deskripsi']); ?></div>

                        <div class="riset-actions">
                            <button class="btn-action btn-edit-riset" onclick='openModal("edit", <?= json_encode($riset, JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_TAG | JSON_HEX_AMP); ?>)'>
                                <i class="fas fa-pen"></i> Edit
                            </button>
                            <a href="<?= BASEURL; ?>/riset/hapus/<?= $riset['id_riset']; ?>" class="btn-action btn-delete-riset" onclick="return confirm('Hapus video riset ini?');">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                            <a href="<?= htmlspecialchars($riset['video_embed']); ?>" target="_blank" class="btn-action btn-watch">
                                Lihat Video
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="empty-state">
                <i class="fas fa-video fa-3x mb-3"></i><br>
                Belum ada data riset video.
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="modal-overlay" id="risetModal">
    <div class="modal-container">
        <div class="modal-header">
            <h3 class="modal-title" id="modalTitle">Tambah Video Riset</h3>
            <button class="modal-close" onclick="closeModal()">&times;</button>
        </div>

        <form id="risetForm" action="" method="post" enctype="multipart/form-data">
            <input type="hidden" id="id_riset" name="id_riset">
            <input type="hidden" id="file_dokumen_lama" name="file_dokumen_lama">

            <div class="form-group">
                <label for="judul_riset">Judul Riset</label>
                <input type="text" class="form-control" id="judul_riset" name="judul_riset" required>
            </div>

            <div class="form-group">
                <label for="peneliti">Nama Peneliti</label>
                <input type="text" class="form-control" id="peneliti" name="peneliti" required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
            </div>

            <div class="form-group">
                <label for="video_embed">Link YouTube</label>
                <input type="url" class="form-control" id="video_embed" name="video_embed" placeholder="Contoh: https://www.youtube.com/watch?v=xxxxx">
            </div>

            <div class="form-group">
                <label for="file_dokumen">Thumbnail Video</label>
                <div class="image-preview-container" id="imagePreviewContainer">
                    <p style="margin: 0 0 5px 0; font-size: 0.85rem; color: #64748b;">Thumbnail Saat Ini:</p>
                    <img src="" alt="Preview" class="image-preview-img" id="imagePreview">
                </div>
                <input type="file" class="form-control" id="file_dokumen" name="file_dokumen" accept="image/jpeg, image/png, image/jpg" style="margin-top: 8px;" onchange="previewNewImage(this)">
                <small style="color: #94a3b8; font-size: 0.8rem;">Format: JPG, PNG. Kosongkan jika tidak ingin mengubah thumbnail.</small>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn-modal-cancel" onclick="closeModal()">Batal</button>
                <button type="submit" class="btn-modal-save">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    const modal = document.getElementById('risetModal');
    const modalTitle = document.getElementById('modalTitle');
    const form = document.getElementById('risetForm');

    const BASEURL = "<?= BASEURL; ?>";

    function openModal(mode, data = null) {
        modal.classList.add('show');

        if (mode === 'add') {
            modalTitle.innerText = 'Tambah Video Riset';
            form.action = BASEURL + '/riset/simpan';
            form.reset();

            document.getElementById('imagePreviewContainer').style.display = 'none';
            document.getElementById('id_riset').value = '';
            document.getElementById('file_dokumen_lama').value = '';

        } else if (mode === 'edit' && data) {
            modalTitle.innerText = 'Edit Video Riset';
            form.action = BASEURL + '/riset/update';

            document.getElementById('id_riset').value = data.id_riset;
            document.getElementById('judul_riset').value = data.judul_riset;
            document.getElementById('peneliti').value = data.peneliti;
            document.getElementById('deskripsi').value = data.deskripsi;
            document.getElementById('video_embed').value = data.video_embed;
            document.getElementById('file_dokumen_lama').value = data.file_dokumen;

            if (data.file_dokumen) {
                document.getElementById('imagePreview').src = BASEURL + '/img/riset/' + data.file_dokumen;
                document.getElementById('imagePreviewContainer').style.display = 'block';
            } else {
                document.getElementById('imagePreviewContainer').style.display = 'none';
            }
        }
    }

    function closeModal() {
        modal.classList.remove('show');
    }

    function previewNewImage(input) {
        const previewContainer = document.getElementById('imagePreviewContainer');
        const previewImage = document.getElementById('imagePreview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.style.display = 'block';
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            closeModal();
        }
    }
</script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>