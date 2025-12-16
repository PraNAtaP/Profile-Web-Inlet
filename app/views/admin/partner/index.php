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

    .partner-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        gap: 25px;
    }

    .partner-card {
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02);
        transition: all 0.2s ease;
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .partner-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
        border-color: #334eac;
    }

    .logo-wrapper {
        height: 160px;
        background-color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        border-bottom: 1px solid #f1f5f9;
    }

    .logo-wrapper img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
        transition: transform 0.3s;
    }

    .partner-card:hover .logo-wrapper img {
        transform: scale(1.1);
    }

    .partner-info {
        padding: 20px;
        text-align: center;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .partner-name {
        font-size: 1.1rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 8px;
    }

    .partner-link {
        font-size: 0.9rem;
        color: #334eac;
        text-decoration: none;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 4px;
    }

    .partner-link:hover {
        text-decoration: underline;
    }

    .card-actions {
        display: flex;
        border-top: 1px solid #f1f5f9;
    }

    .btn-action {
        flex: 1;
        padding: 12px;
        text-align: center;
        font-weight: 600;
        font-size: 0.85rem;
        text-decoration: none;
        transition: background 0.2s;
        border: none;
        cursor: pointer;
        display: inline-block;
    }

    .btn-edit-card {
        background-color: #fcfcfc;
        color: #f39c12;
        border-right: 1px solid #f1f5f9;
    }

    .btn-edit-card:hover {
        background-color: #fff8e1;
    }

    .btn-delete-card {
        background-color: #fcfcfc;
        color: #e74c3c;
    }

    .btn-delete-card:hover {
        background-color: #fceceb;
    }

    .empty-state {
        grid-column: 1 / -1;
        text-align: center;
        padding: 60px;
        background: white;
        border-radius: 12px;
        border: 2px dashed #cbd5e1;
        color: #94a3b8;
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
            Tambah Partner
        </button>
    </div>

    <div class="partner-grid">
        <?php if (isset($data['partner']) && !empty($data['partner'])) : ?>
            <?php foreach ($data['partner'] as $p) : ?>
                <div class="partner-card">
                    <div class="logo-wrapper">
                        <img src="<?= BASEURL; ?>/img/partner/<?= $p['logo']; ?>" alt="<?= htmlspecialchars($p['nama']); ?>">
                    </div>

                    <div class="partner-info">
                        <div class="partner-name"><?= htmlspecialchars($p['nama']); ?></div>
                        <a href="<?= $p['link']; ?>" target="_blank" class="partner-link">
                            Kunjungi Website
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                                <polyline points="15 3 21 3 21 9"></polyline>
                                <line x1="10" y1="14" x2="21" y2="3"></line>
                            </svg>
                        </a>
                    </div>

                    <div class="card-actions">
                        <button class="btn-action btn-edit-card" onclick='openModal("edit", <?= json_encode($p, JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_TAG | JSON_HEX_AMP); ?>)'>Edit</button>
                        <a href="<?= BASEURL; ?>/partner/hapus/<?= $p['id_media_partner']; ?>" class="btn-action btn-delete-card delete-btn">Hapus</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="empty-state">
                <h3>Belum ada Media Partner</h3>
                <p>Silakan tambahkan partner kerjasama.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="modal-overlay" id="partnerModal">
    <div class="modal-container">
        <div class="modal-header">
            <h3 class="modal-title" id="modalTitle">Tambah Partner</h3>
            <button class="modal-close" onclick="closeModal()">&times;</button>
        </div>

        <form id="partnerForm" action="" method="post" enctype="multipart/form-data">
            <input type="hidden" id="id_media_partner" name="id_media_partner">
            <input type="hidden" id="logo_lama" name="logo_lama">

            <div class="form-group">
                <label for="nama">Nama Partner</label>
                <input type="text" class="form-control" id="nama" name="nama" required placeholder="Contoh: Google">
            </div>

            <div class="form-group">
                <label for="link">Link Website</label>
                <input type="url" class="form-control" id="link" name="link" required placeholder="https://example.com">
            </div>

            <div class="form-group">
                <label for="logo">Logo Partner</label>
                <div class="image-preview-container" id="imagePreviewContainer">
                    <p style="margin: 0 0 5px 0; font-size: 0.85rem; color: #64748b;">Logo Saat Ini:</p>
                    <img src="" alt="Preview" class="image-preview-img" id="imagePreview">
                </div>
                <input type="file" class="form-control" id="logo" name="logo" accept="image/jpeg, image/png, image/webp" style="margin-top: 8px;">
                <small style="color: #94a3b8; font-size: 0.8rem;">Format: JPG, PNG, WEBP. Kosongkan jika tidak ingin mengubah logo.</small>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn-modal-cancel" onclick="closeModal()">Batal</button>
                <button type="submit" class="btn-modal-save">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    const modal = document.getElementById('partnerModal');
    const modalTitle = document.getElementById('modalTitle');
    const form = document.getElementById('partnerForm');

    const BASEURL = "<?= BASEURL; ?>";

    function openModal(mode, data = null) {
        modal.classList.add('show');

        if (mode === 'add') {
            modalTitle.innerText = 'Tambah Partner';
            form.action = BASEURL + '/partner/simpan';
            form.reset();

            document.getElementById('imagePreviewContainer').style.display = 'none';
            document.getElementById('id_media_partner').value = '';
            document.getElementById('logo_lama').value = '';

        } else if (mode === 'edit' && data) {
            modalTitle.innerText = 'Edit Partner';
            form.action = BASEURL + '/partner/update';

            document.getElementById('id_media_partner').value = data.id_media_partner;
            document.getElementById('nama').value = data.nama;
            document.getElementById('link').value = data.link;
            document.getElementById('logo_lama').value = data.logo;

            if (data.logo) {
                document.getElementById('imagePreview').src = BASEURL + '/img/partner/' + data.logo;
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