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

    .btn-add-product {
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

    .btn-add-product:hover {
        background-color: #219150;
        transform: translateY(-2px);
    }

    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(450px, 1fr));
        gap: 25px;
    }

    .product-card {
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        display: flex;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02);
        border: 1px solid #e2e8f0;
        transition: transform 0.2s, box-shadow 0.2s;
        height: 220px;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        border-color: #334eac;
    }

    .product-img-wrapper {
        width: 40%;
        flex-shrink: 0;
        position: relative;
        overflow: hidden;
    }

    .product-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s;
    }

    .product-card:hover .product-img {
        transform: scale(1.05);
    }

    .product-content {
        width: 60%;
        padding: 20px;
        display: flex;
        flex-direction: column;
        position: relative;
    }

    .product-title {
        font-size: 1.1rem;
        font-weight: 800;
        color: #1e293b;
        margin-bottom: 8px;
        line-height: 1.3;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .product-date {
        font-size: 0.8rem;
        color: #94a3b8;
        margin-bottom: 12px;
        font-weight: 600;
    }

    .product-link-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        background: #f1f5f9;
        color: #334eac;
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 0.8rem;
        font-weight: 600;
        text-decoration: none;
        width: fit-content;
        margin-bottom: auto;
    }

    .product-link-badge:hover {
        background: #e2e8f0;
    }

    .product-actions {
        display: flex;
        gap: 10px;
        justify-content: flex-end;
        margin-top: 15px;
    }

    .btn-action {
        padding: 8px 16px;
        border-radius: 6px;
        font-size: 0.85rem;
        font-weight: 700;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: 0.2s;
        border: none;
        cursor: pointer;
    }

    .btn-edit-prod {
        background-color: #27ae60;
        color: white;
    }

    .btn-edit-prod:hover {
        background-color: #219150;
    }

    .btn-delete-prod {
        background-color: #ef4444;
        color: white;
    }

    .btn-delete-prod:hover {
        background-color: #dc2626;
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
        <button class="btn-add-product" onclick="openModal('add')">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            Add Products
        </button>
    </div>

    <div class="product-grid">
        <?php if (isset($data['produk']) && !empty($data['produk'])) : ?>
            <?php foreach ($data['produk'] as $p) : ?>
                <div class="product-card">
                    <div class="product-img-wrapper">
                        <img src="<?= BASEURL; ?>/img/produk/<?= $p['gambar']; ?>" alt="Product Img" class="product-img">
                    </div>

                    <div class="product-content">
                        <div class="product-title"><?= htmlspecialchars($p['judul']); ?></div>

                        <div class="product-date">10 November 2025</div>

                        <a href="<?= $p['link']; ?>" target="_blank" class="product-link-badge">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                                <polyline points="15 3 21 3 21 9"></polyline>
                                <line x1="10" y1="14" x2="21" y2="3"></line>
                            </svg>
                            Kunjungi Link
                        </a>

                        <div class="product-actions">
                            <button class="btn-action btn-edit-prod" onclick='openModal("edit", <?= json_encode($p, JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_TAG | JSON_HEX_AMP); ?>)'>
                                <i class="fas fa-pen"></i> Edit
                            </button>
                            <a href="<?= BASEURL; ?>/produk/hapus/<?= $p['id_produk']; ?>" class="btn-action btn-delete-prod" onclick="return confirm('Apakah anda yakin ingin menghapus produk ini?');">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="empty-state">
                <i class="fas fa-box-open fa-3x mb-3"></i><br>
                Belum ada produk yang ditambahkan.
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="modal-overlay" id="produkModal">
    <div class="modal-container">
        <div class="modal-header">
            <h3 class="modal-title" id="modalTitle">Tambah Produk</h3>
            <button class="modal-close" onclick="closeModal()">&times;</button>
        </div>

        <form id="produkForm" action="" method="post" enctype="multipart/form-data">
            <input type="hidden" id="id_produk" name="id_produk">
            <input type="hidden" id="gambar_lama" name="gambar_lama">

            <div class="form-group">
                <label for="judul">Judul Produk</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>

            <div class="form-group">
                <label for="link">Link Produk</label>
                <input type="url" class="form-control" id="link" name="link" required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
            </div>

            <div class="form-group">
                <label for="gambar">Gambar Produk</label>
                <div class="image-preview-container" id="imagePreviewContainer">
                    <p style="margin: 0 0 5px 0; font-size: 0.85rem; color: #64748b;">Gambar Saat Ini:</p>
                    <img src="" alt="Preview" class="image-preview-img" id="imagePreview">
                </div>
                <input type="file" class="form-control" id="gambar" name="gambar" accept="image/jpeg, image/png, image/jpg" style="margin-top: 8px;">
                <small style="color: #94a3b8; font-size: 0.8rem;">Format: JPG, PNG. Kosongkan jika tidak ingin mengubah gambar.</small>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn-modal-cancel" onclick="closeModal()">Batal</button>
                <button type="submit" class="btn-modal-save">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    const modal = document.getElementById('produkModal');
    const modalTitle = document.getElementById('modalTitle');
    const form = document.getElementById('produkForm');

    const BASEURL = "<?= BASEURL; ?>";

    function openModal(mode, data = null) {
        modal.classList.add('show');

        if (mode === 'add') {
            modalTitle.innerText = 'Tambah Produk';
            form.action = BASEURL + '/produk/simpan';
            form.reset();

            document.getElementById('imagePreviewContainer').style.display = 'none';
            document.getElementById('id_produk').value = '';
            document.getElementById('gambar_lama').value = '';

        } else if (mode === 'edit' && data) {
            modalTitle.innerText = 'Edit Produk';
            form.action = BASEURL + '/produk/update';

            document.getElementById('id_produk').value = data.id_produk;
            document.getElementById('judul').value = data.judul;
            document.getElementById('link').value = data.link;
            document.getElementById('deskripsi').value = data.deskripsi;
            document.getElementById('gambar_lama').value = data.gambar;

            if (data.gambar) {
                document.getElementById('imagePreview').src = BASEURL + '/img/produk/' + data.gambar;
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
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>