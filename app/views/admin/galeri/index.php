<style>
    .content-area {
        padding: 20px 40px 60px 40px;
        background-color: #f8f9fa;
        min-height: 100vh;
    }

    .top-action-bar {
        margin-bottom: 30px;
        display: flex;
        justify-content: flex-start;
    }

    .btn-add {
        background-color: #27ae60;
        color: white;
        padding: 12px 24px;
        border-radius: 8px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 4px 10px rgba(39, 174, 96, 0.2);
        border: none;
        font-size: 0.95rem;
        transition: transform 0.2s;
        cursor: pointer;
    }

    .btn-add:hover {
        background-color: #219150;
        transform: translateY(-2px);
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 30px;
    }

    .gallery-card {
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        border: 1px solid #e2e8f0;
        transition: transform 0.2s, box-shadow 0.2s;
        display: flex;
        flex-direction: column;
    }

    .gallery-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        border-color: #334eac;
    }

    .gallery-img-wrapper {
        position: relative;
        width: 100%;
        padding-top: 65%;
        overflow: hidden;
        background-color: #f1f5f9;
    }

    .gallery-img-wrapper img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .gallery-card:hover .gallery-img-wrapper img {
        transform: scale(1.05);
    }

    .gallery-body {
        padding: 20px;
        flex-grow: 1;
    }

    .gallery-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 10px;
        line-height: 1.4;
    }

    .gallery-desc {
        font-size: 0.9rem;
        color: #64748b;
        line-height: 1.6;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .gallery-footer {
        padding: 15px 20px;
        border-top: 1px solid #f1f5f9;
        display: flex;
        gap: 10px;
        background-color: #fff;
    }

    .btn-action {
        flex: 1;
        text-align: center;
        padding: 8px 0;
        border-radius: 6px;
        font-size: 0.85rem;
        font-weight: 600;
        text-decoration: none;
        transition: 0.2s;
        border: none;
        cursor: pointer;
        display: inline-block;
    }

    .btn-edit-card {
        background-color: #f1c40f;
        color: white;
    }

    .btn-edit-card:hover {
        background-color: #d4ac0d;
    }

    .btn-delete-card {
        background-color: #c0392b;
        color: white;
    }

    .btn-delete-card:hover {
        background-color: #a93226;
    }

    .empty-state {
        grid-column: 1 / -1;
        text-align: center;
        padding: 50px;
        color: #94a3b8;
        background: #fff;
        border-radius: 12px;
        border: 2px dashed #cbd5e1;
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
        max-height: 200px;
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
        <button class="btn-add" onclick="openModal('add')">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            Tambah Galeri
        </button>
    </div>

    <div class="gallery-grid">
        <?php if (empty($data['galeri'])): ?>
            <div class="empty-state">
                <h3>Belum ada foto galeri</h3>
                <p>Silakan tambahkan dokumentasi kegiatan lab.</p>
            </div>
        <?php else: ?>
            <?php foreach ($data['galeri'] as $item) : ?>
                <div class="gallery-card">
                    <div class="gallery-img-wrapper">
                        <img src="<?= BASEURL; ?>/img/galeri/<?= htmlspecialchars($item['foto']); ?>" alt="<?= htmlspecialchars($item['judul']); ?>">
                    </div>

                    <div class="gallery-body">
                        <div class="gallery-title"><?= htmlspecialchars($item['judul']); ?></div>
                        <div class="gallery-desc">
                            <?= nl2br(htmlspecialchars($item['deskripsi'])); ?>
                        </div>
                    </div>

                    <div class="gallery-footer">
                        <button class="btn-action btn-edit-card" onclick='openModal("edit", <?= json_encode($item, JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_TAG | JSON_HEX_AMP); ?>)'>Edit</button>
                        <a href="<?= BASEURL; ?>/galeri/hapus/<?= $item['id_galeri']; ?>" class="btn-action btn-delete-card" onclick="return confirm('Apakah anda yakin ingin menghapus foto ini?');">Hapus</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<div class="modal-overlay" id="galeriModal">
    <div class="modal-container">
        <div class="modal-header">
            <h3 class="modal-title" id="modalTitle">Tambah Galeri</h3>
            <button class="modal-close" onclick="closeModal()">&times;</button>
        </div>

        <form id="galeriForm" action="" method="post" enctype="multipart/form-data">
            <input type="hidden" id="id_galeri" name="id_galeri">
            <input type="hidden" id="foto_lama" name="foto_lama">

            <div class="form-group">
                <label for="judul">Judul Foto</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
            </div>

            <div class="form-group">
                <label for="video_embed">Link Video (Opsional)</label>
                <input type="text" class="form-control" id="video_embed" name="video_embed" placeholder="Contoh: https://www.youtube.com/watch?v=xxxxx">
            </div>

            <div class="form-group">
                <label for="foto">Foto Galeri</label>
                <div class="image-preview-container" id="imagePreviewContainer">
                    <p style="margin: 0 0 5px 0; font-size: 0.85rem; color: #64748b;">Foto Saat Ini:</p>
                    <img src="" alt="Preview" class="image-preview-img" id="imagePreview">
                </div>
                <input type="file" class="form-control" id="foto" name="foto" accept="image/jpeg, image/png, image/jpg" style="margin-top: 8px;" onchange="previewNewImage(this)">
                <small style="color: #94a3b8; font-size: 0.8rem;">Format: JPG, PNG. Kosongkan jika tidak ingin mengubah foto.</small>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn-modal-cancel" onclick="closeModal()">Batal</button>
                <button type="submit" class="btn-modal-save">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    const modal = document.getElementById('galeriModal');
    const modalTitle = document.getElementById('modalTitle');
    const form = document.getElementById('galeriForm');

    const BASEURL = "<?= BASEURL; ?>";

    function openModal(mode, data = null) {
        modal.classList.add('show');

        if (mode === 'add') {
            modalTitle.innerText = 'Tambah Galeri';
            form.action = BASEURL + '/galeri/simpan';
            form.reset();

            document.getElementById('imagePreviewContainer').style.display = 'none';
            document.getElementById('id_galeri').value = '';
            document.getElementById('foto_lama').value = '';

        } else if (mode === 'edit' && data) {
            modalTitle.innerText = 'Edit Galeri';
            form.action = BASEURL + '/galeri/update';

            document.getElementById('id_galeri').value = data.id_galeri;
            document.getElementById('judul').value = data.judul;
            document.getElementById('deskripsi').value = data.deskripsi;
            document.getElementById('video_embed').value = data.video_embed;
            document.getElementById('foto_lama').value = data.foto;

            if (data.foto) {
                document.getElementById('imagePreview').src = BASEURL + '/img/galeri/' + data.foto;
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