<style>
    .content-area {
        padding: 20px 40px 60px 40px;
        background-color: #f8f9fa;
        min-height: 100vh;
    }

    .page-header {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        margin-bottom: 35px;
        margin-top: 10px;
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
        box-shadow: 0 6px 15px rgba(39, 174, 96, 0.3);
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
    }

    .table th:last-child {
        border-right: none;
        text-align: center;
    }

    .table td {
        padding: 20px 25px;
        vertical-align: middle;
        color: #2c3e50;
        border-bottom: 1px solid #d1d5db;
        border-right: 1px solid #e5e7eb;
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

    .action-btn-group {
        display: flex;
        justify-content: center;
        gap: 8px;
    }

    .btn-edit,
    .btn-delete {
        padding: 8px 16px;
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

    .avatar-img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 50%;
        border: 2px solid #e2e8f0;
        display: block;
        margin: 0 auto;
    }

    .badge-status {
        color: #27ae60;
        font-weight: 700;
        background: rgba(39, 174, 96, 0.1);
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        display: inline-block;
    }

    /* --- CSS MODAL (Disamakan dengan Berita) --- */
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
        max-width: 150px;
        max-height: 150px;
        object-fit: cover;
        border-radius: 50%;
        border: 2px solid #e2e8f0;
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

    <div class="page-header">
        <button class="btn-add" onclick="openModal('add')">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            Add Team
        </button>
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 70px; text-align: center;">No.</th>
                    <th style="width: 100px; text-align: center;">Foto</th>
                    <th>Nama Anggota</th>
                    <th>Jabatan</th>
                    <th style="text-align: center; width: 120px;">Status</th>
                    <th>Email / Kontak</th>
                    <th style="width: 200px; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($data['anggota']) && !empty($data['anggota'])): ?>
                    <?php foreach ($data['anggota'] as $key => $agt): ?>
                        <tr>
                            <td style="text-align: center; font-weight: 800; color: #7f8c8d;"><?= sprintf("%02d", $key + 1); ?>.</td>
                            <td>
                                <?php if (!empty($agt['foto'])): ?>
                                    <img src="<?= BASEURL; ?>/img/anggota/<?= $agt['foto']; ?>" alt="Foto" class="avatar-img">
                                <?php else: ?>
                                    <img src="https://ui-avatars.com/api/?name=<?= urlencode($agt['nama']); ?>&background=random&color=fff&bold=true" alt="Avatar" class="avatar-img">
                                <?php endif; ?>
                            </td>
                            <td style="font-weight: 700; font-size: 1rem;"><?= htmlspecialchars($agt['nama']); ?></td>
                            <td><?= htmlspecialchars($agt['jabatan']); ?></td>
                            <td style="text-align: center;">
                                <span class="badge-status">Aktif</span>
                            </td>
                            <td>
                                <?= !empty($agt['kontak']) ? htmlspecialchars($agt['kontak']) : '-'; ?>
                            </td>
                            <td>
                                <div class="action-btn-group">
                                    <button class="btn-edit"
                                        onclick='openModal("edit", <?= json_encode($agt, JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_TAG | JSON_HEX_AMP); ?>)'>
                                        Edit
                                    </button>
                                    <a href="<?= BASEURL; ?>/anggota/hapus/<?= $agt['id_anggota']; ?>" class="btn-delete" onclick="return confirm('Yakin hapus data ini King?');">Hapus</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 40px; color: #7f8c8d;">
                            <img src="https://cdni.iconscout.com/illustration/premium/thumb/empty-state-2130362-1800926.png" alt="Empty" style="width: 150px; opacity: 0.6; margin-bottom: 10px;"><br>
                            Belum ada data anggota tim nih, King.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal-overlay" id="anggotaModal">
    <div class="modal-container">
        <div class="modal-header">
            <h3 class="modal-title" id="modalTitle">Tambah Anggota</h3>
            <button class="modal-close" onclick="closeModal()">&times;</button>
        </div>

        <form id="anggotaForm" action="" method="post" enctype="multipart/form-data">
            <input type="hidden" id="id_anggota" name="id_anggota">
            <input type="hidden" id="foto_lama" name="foto_lama">

            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>

            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="kontak">Kontak (No. HP)</label>
                <input type="text" class="form-control" id="kontak" name="kontak">
            </div>

            <div class="form-group">
                <label for="foto">Foto Profil</label>
                <div class="image-preview-container" id="imagePreviewContainer">
                    <p style="margin: 0 0 5px 0; font-size: 0.85rem; color: #64748b;">Foto Saat Ini:</p>
                    <img src="" alt="Preview" class="image-preview-img" id="imagePreview">
                </div>
                <input type="file" class="form-control" id="foto" name="foto" accept="image/jpeg, image/png, image/jpg" style="margin-top: 8px;">
                <small style="color: #94a3b8; font-size: 0.8rem;">Format: JPG, PNG. Ukuran maks 2MB. Kosongkan jika tidak ingin mengubah.</small>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn-modal-cancel" onclick="closeModal()">Batal</button>
                <button type="submit" class="btn-modal-save">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    const modal = document.getElementById('anggotaModal');
    const modalTitle = document.getElementById('modalTitle');
    const form = document.getElementById('anggotaForm');
    const BASEURL = "<?= BASEURL; ?>";

    function openModal(mode, data = null) {
        modal.classList.add('show');

        if (mode === 'add') {
            modalTitle.innerText = 'Tambah Anggota';
            form.action = BASEURL + '/anggota/simpan';
            form.reset();

            document.getElementById('imagePreviewContainer').style.display = 'none';
            document.getElementById('id_anggota').value = '';
            document.getElementById('foto_lama').value = '';

        } else if (mode === 'edit' && data) {
            modalTitle.innerText = 'Edit Anggota';
            form.action = BASEURL + '/anggota/update';

            document.getElementById('id_anggota').value = data.id_anggota;
            document.getElementById('nama').value = data.nama;
            document.getElementById('jabatan').value = data.jabatan;
            document.getElementById('email').value = data.email;
            document.getElementById('kontak').value = data.kontak;
            document.getElementById('foto_lama').value = data.foto;

            if (data.foto) {
                document.getElementById('imagePreview').src = BASEURL + '/img/anggota/' + data.foto;
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