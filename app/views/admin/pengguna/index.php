<style>
    .content-area {
        padding: 20px 40px 60px 40px;
        background-color: #f8f9fa;
        min-height: 100vh;
    }

    .top-action-bar {
        margin-bottom: 25px;
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

    .table th:last-child {
        border-right: none;
        text-align: center;
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

    .col-no {
        font-weight: 800;
        color: #334eac;
        text-align: center;
    }

    .admin-profile {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .initial-avatar {
        width: 35px;
        height: 35px;
        background-color: #e0f2fe;
        color: #0369a1;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.9rem;
    }

    .badge-you {
        background-color: #dbeafe;
        color: #1e40af;
        padding: 2px 8px;
        border-radius: 4px;
        font-size: 0.75rem;
        margin-left: 8px;
        border: 1px solid #bfdbfe;
    }

    .action-btn-group {
        display: flex;
        justify-content: center;
        gap: 8px;
    }

    .btn-action {
        padding: 8px 16px;
        border-radius: 6px;
        font-size: 0.85rem;
        font-weight: 700;
        text-decoration: none;
        transition: 0.2s;
        border: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        cursor: pointer;
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
        max-width: 500px;
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

    .password-hint {
        font-size: 0.8rem;
        color: #94a3b8;
        margin-top: 5px;
        display: none;
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
            Tambah Admin Baru
        </button>
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 70px; text-align: center;">No</th>
                    <th>Nama Lengkap</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th style="width: 200px; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($data['admin'] as $admin) : ?>
                    <tr>
                        <td class="col-no"><?= sprintf("%02d", $i++); ?>.</td>
                        <td>
                            <div class="admin-profile">
                                <div class="initial-avatar">
                                    <?= strtoupper(substr($admin['nama'], 0, 1)); ?>
                                </div>
                                <span><?= htmlspecialchars($admin['nama']); ?></span>

                                <?php if ($admin['id_admin'] == $_SESSION['admin_id']) : ?>
                                    <span class="badge-you">You</span>
                                <?php endif; ?>
                            </div>
                        </td>
                        <td style="font-family: monospace; color: #64748b; font-size: 1rem;">
                            @<?= htmlspecialchars($admin['username']); ?>
                        </td>
                        <td><?= htmlspecialchars($admin['email']); ?></td>
                        <td>
                            <div class="action-btn-group">
                                <button class="btn-action btn-edit" onclick='openModal("edit", <?= json_encode($admin, JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_TAG | JSON_HEX_AMP); ?>)'>
                                    Edit
                                </button>
                                <?php if ($admin['id_admin'] != $_SESSION['admin_id']) : ?>
                                    <a href="<?= BASEURL; ?>/pengguna/hapus/<?= $admin['id_admin']; ?>" class="btn-action delete-btn">
                                        Hapus
                                    </a>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal-overlay" id="adminModal">
    <div class="modal-container">
        <div class="modal-header">
            <h3 class="modal-title" id="modalTitle">Tambah Admin</h3>
            <button class="modal-close" onclick="closeModal()">&times;</button>
        </div>

        <form id="adminForm" action="" method="post">
            <input type="hidden" id="id_admin" name="id_admin">

            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" minlength="8" oninput="checkPasswordLen()">
                <small id="passLenError" class="text-danger" style="display: none; font-size: 0.8em; margin-top: 5px;">
                    *password harus memiliki panjang minimal 8 karakter
                </small>
                <small class="password-hint" id="passwordHint">Kosongkan jika tidak ingin mengganti password.</small>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn-modal-cancel" onclick="closeModal()">Batal</button>
                <button type="submit" class="btn-modal-save">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    const modal = document.getElementById('adminModal');
    const modalTitle = document.getElementById('modalTitle');
    const form = document.getElementById('adminForm');
    const passwordInput = document.getElementById('password');
    const passwordHint = document.getElementById('passwordHint');
    const passLenError = document.getElementById('passLenError');

    const BASEURL = "<?= BASEURL; ?>";

    function checkPasswordLen() {
        const val = passwordInput.value;
        if (val.length > 0 && val.length < 8) {
            passLenError.style.display = 'block';
        } else {
            passLenError.style.display = 'none';
        }
    }

    function openModal(mode, data = null) {
        modal.classList.add('show');
        passLenError.style.display = 'none';

        if (mode === 'add') {
            modalTitle.innerText = 'Tambah Admin';
            form.action = BASEURL + '/pengguna/simpan';
            form.reset();

            document.getElementById('id_admin').value = '';

            passwordInput.required = true;
            passwordHint.style.display = 'none';

        } else if (mode === 'edit' && data) {
            modalTitle.innerText = 'Edit Admin';
            form.action = BASEURL + '/pengguna/update';

            document.getElementById('id_admin').value = data.id_admin;
            document.getElementById('nama').value = data.nama;
            document.getElementById('email').value = data.email;
            document.getElementById('username').value = data.username;

            passwordInput.value = '';
            passwordInput.required = false; // Di mode edit, required false
            passwordHint.style.display = 'block';
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