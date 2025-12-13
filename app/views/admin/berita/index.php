<style>
    .content-area {
        padding: 20px 40px 60px 40px;
        background-color: #f8f9fa;
        min-height: 100vh;
    }

    .top-action-bar {
        display: flex;
        justify-content: flex-start;
        margin-bottom: 25px;
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
        transition: transform 0.2s;
        border: none;
        font-size: 0.95rem;
        cursor: pointer;
    }

    .btn-add:hover {
        background-color: #219150;
        transform: translateY(-2px);
    }

    .table-wrapper {
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        border: 2px solid #334eac;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table thead {
        background-color: #334eac;
        color: white;
    }

    .table th {
        padding: 20px 25px;
        text-align: left;
        font-weight: 600;
        letter-spacing: 0.5px;
        font-size: 1rem;
        border-right: 1px solid rgba(255, 255, 255, 0.15);
        vertical-align: middle;
    }

    .table th.text-center {
        text-align: center;
    }

    .table th:last-child {
        border-right: none;
    }

    .table td {
        padding: 20px 25px;
        vertical-align: middle;
        color: #2c3e50;
        border-bottom: 1px solid #d1d5db;
        border-right: 1px solid #334eac;
        font-size: 0.95rem;
        font-weight: 500;
    }

    .table td:last-child {
        border-right: none;
        text-align: center;
    }

    .table tbody tr:last-child td {
        border-bottom: none;
    }

    .table tbody tr:hover {
        background-color: #f0f4ff;
    }

    .news-thumbnail {
        width: 120px;
        height: 80px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        display: block;
        margin: 0 auto;
    }

    .action-btn-group {
        display: flex;
        justify-content: center;
        gap: 8px;
    }

    .btn-edit,
    .btn-delete {
        padding: 8px 20px;
        border-radius: 6px;
        font-size: 0.85rem;
        font-weight: 700;
        text-decoration: none;
        transition: 0.2s;
        border: none;
        cursor: pointer;
        display: inline-block;
    }

    .btn-edit {
        background-color: #f1c40f;
        color: white;
    }

    .btn-edit:hover {
        background-color: #d4ac0d;
    }

    .btn-delete {
        background-color: #c0392b;
        color: white;
    }

    .btn-delete:hover {
        background-color: #a93226;
    }

    .col-no {
        font-weight: 800;
        color: #334eac;
        font-size: 1.1rem;
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
        min-height: 120px;
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
        <button class="btn-add" onclick="openModal('add')">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            Tambah Berita
        </button>
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 70px;" class="text-center">No.</th>
                    <th style="width: 160px;" class="text-center">Gambar</th>
                    <th>Judul Berita</th>
                    <th style="width: 200px;" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($data['berita']) && !empty($data['berita'])): ?>
                    <?php foreach ($data['berita'] as $key => $berita): ?>
                        <tr>
                            <td class="text-center col-no"><?= sprintf("%02d", $key + 1); ?>.</td>

                            <td>
                                <?php if (!empty($berita['gambar'])): ?>
                                    <img src="<?= BASEURL; ?>/img/berita/<?= htmlspecialchars($berita['gambar']); ?>" alt="News Thumb" class="news-thumbnail">
                                <?php else: ?>
                                    <img src="https://placehold.co/120x80/e2e8f0/64748b?text=No+Img" alt="No Img" class="news-thumbnail">
                                <?php endif; ?>
                            </td>

                            <td style="font-weight: 600; font-size: 1rem; line-height: 1.5;">
                                <?= htmlspecialchars($berita['judul']); ?>
                            </td>

                            <td>
                                <div class="action-btn-group">
                                    <button class="btn-edit"
                                        onclick='openModal("edit", <?= json_encode($berita, JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_TAG | JSON_HEX_AMP); ?>)'>
                                        Edit
                                    </button>
                                    <a href="<?= BASEURL; ?>/berita/hapus/<?= $berita['id_berita']; ?>" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" style="text-align: center; padding: 40px; color: #7f8c8d;">
                            Belum ada berita yang diupload, King.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal-overlay" id="beritaModal">
    <div class="modal-container">
        <div class="modal-header">
            <h3 class="modal-title" id="modalTitle">Tambah Berita</h3>
            <button class="modal-close" onclick="closeModal()">&times;</button>
        </div>

        <form id="beritaForm" action="" method="post" enctype="multipart/form-data">
            <input type="hidden" id="id_berita" name="id_berita">
            <input type="hidden" id="gambar_lama" name="gambar_lama">

            <div class="form-group">
                <label for="judul">Judul Berita</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>

            <div class="form-group">
                <label for="gambar">Gambar Berita</label>
                <div class="image-preview-container" id="imagePreviewContainer">
                    <p style="margin: 0 0 5px 0; font-size: 0.85rem; color: #64748b;">Gambar Saat Ini:</p>
                    <img src="" alt="Preview" class="image-preview-img" id="imagePreview">
                </div>
                <input type="file" class="form-control" id="gambar" name="gambar" accept="image/jpeg, image/png, image/jpg" style="margin-top: 8px;">
                <small style="color: #94a3b8; font-size: 0.8rem;">Format: JPG, PNG. Kosongkan jika tidak ingin mengubah gambar.</small>
            </div>

            <div class="form-group">
                <label for="isi">Isi Berita</label>
                <textarea class="form-control" id="isi" name="isi" rows="6" required></textarea>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn-modal-cancel" onclick="closeModal()">Batal</button>
                <button type="submit" class="btn-modal-save">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    const modal = document.getElementById('beritaModal');
    const modalTitle = document.getElementById('modalTitle');
    const form = document.getElementById('beritaForm');

    const BASEURL = "<?= BASEURL; ?>";

    function openModal(mode, data = null) {
        modal.classList.add('show');

        if (mode === 'add') {
            modalTitle.innerText = 'Tambah Berita';
            form.action = BASEURL + '/berita/simpan';
            form.reset();

            document.getElementById('imagePreviewContainer').style.display = 'none';
            document.getElementById('id_berita').value = '';
            document.getElementById('gambar_lama').value = '';

        } else if (mode === 'edit' && data) {
            modalTitle.innerText = 'Edit Berita';
            form.action = BASEURL + '/berita/update';

            document.getElementById('id_berita').value = data.id_berita;
            document.getElementById('judul').value = data.judul;
            document.getElementById('isi').value = data.isi;
            document.getElementById('gambar_lama').value = data.gambar;

            if (data.gambar) {
                document.getElementById('imagePreview').src = BASEURL + '/img/berita/' + data.gambar;
                document.getElementById('imagePreviewContainer').style.display = 'block';
            } else {
                document.getElementById('imagePreviewContainer').style.display = 'none';
            }
        }
    }

    function closeModal() {
        modal.classList.remove('show');
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            closeModal();
        }
    }
</script>