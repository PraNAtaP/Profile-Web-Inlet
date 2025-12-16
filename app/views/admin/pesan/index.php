<style>
    .content-area {
        padding: 20px 40px 60px 40px;
        background-color: #f8f9fa;
        min-height: 100vh;
    }

    .top-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    .page-title {
        font-size: 1.5rem;
        font-weight: 800;
        color: #1e293b;
    }

    .search-wrapper {
        position: relative;
        width: 350px;
    }

    .search-input {
        width: 100%;
        padding: 12px 45px 12px 20px;
        border: 2px solid #e2e8f0;
        border-radius: 50px;
        font-size: 0.95rem;
        background: #fff;
        transition: all 0.2s;
        outline: none;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.02);
    }

    .search-input:focus {
        border-color: #334eac;
        box-shadow: 0 4px 15px rgba(51, 78, 172, 0.1);
    }

    .search-icon {
        position: absolute;
        right: 18px;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
    }

    .message-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 25px;
    }

    .message-card {
        background: #fff;
        border-radius: 16px;
        padding: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02);
        border: 1px solid #f1f5f9;
        display: flex;
        flex-direction: column;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .message-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    }

    .card-header-flex {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 15px;
    }

    .sender-info-group {
        display: flex;
        align-items: flex-start;
        gap: 12px;
    }

    .avatar-circle {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        flex-shrink: 0;
    }

    .sender-text {
        display: flex;
        flex-direction: column;
    }

    .sender-name {
        font-weight: 800;
        color: #1e293b;
        font-size: 1rem;
        line-height: 1.2;
        margin-bottom: 2px;
    }

    .sender-email {
        font-size: 0.8rem;
        color: #64748b;
        margin-bottom: 4px;
    }

    .sender-inst {
        font-size: 0.75rem;
        color: #334eac;
        font-weight: 600;
        background: #e0f2fe;
        padding: 2px 8px;
        border-radius: 4px;
        display: inline-block;
        align-self: flex-start;
    }

    .message-preview {
        color: #334155;
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 20px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        flex-grow: 1;
        font-weight: 500;
    }

    .card-divider {
        height: 1px;
        background: #f1f5f9;
        margin-bottom: 15px;
    }

    .card-footer-flex {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .message-date {
        font-size: 0.8rem;
        color: #94a3b8;
        font-weight: 600;
    }

    .action-group {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .btn-detail {
        background-color: #334eac;
        color: white;
        padding: 8px 16px;
        border-radius: 8px;
        font-size: 0.85rem;
        font-weight: 600;
        text-decoration: none;
        transition: 0.2s;
        border: none;
        cursor: pointer;
        display: inline-block;
    }

    .btn-detail:hover {
        background-color: #1e3a8a;
    }

    .btn-trash {
        color: #1e293b;
        background: #fff;
        border: 1px solid #e2e8f0;
        padding: 7px 10px;
        border-radius: 8px;
        font-size: 1rem;
        cursor: pointer;
        transition: 0.2s;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
    }

    .btn-trash:hover {
        color: #ef4444;
        border-color: #ef4444;
        background-color: #fef2f2;
    }

    .empty-state {
        grid-column: 1 / -1;
        text-align: center;
        padding: 60px;
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
        padding: 0;
        border-radius: 16px;
        width: 100%;
        max-width: 650px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        position: relative;
        transform: translateY(-20px);
        transition: transform 0.3s ease;
        max-height: 90vh;
        overflow-y: auto;
        overflow-x: hidden;
    }

    .modal-overlay.show .modal-container {
        transform: translateY(0);
    }

    .modal-header {
        padding: 25px 30px;
        border-bottom: 1px solid #f1f5f9;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        background-color: #fff;
        position: sticky;
        top: 0;
        z-index: 10;
    }

    .detail-sender {
        display: flex;
        gap: 15px;
        align-items: center;
    }

    .detail-avatar {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #f8fafc;
    }

    .detail-meta h3 {
        margin: 0 0 5px 0;
        font-size: 1.2rem;
        font-weight: 800;
        color: #1e293b;
    }

    .detail-meta p {
        margin: 0;
        color: #64748b;
        font-size: 0.9rem;
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

    .modal-body {
        padding: 30px;
        color: #334155;
        font-size: 1rem;
        line-height: 1.8;
        white-space: pre-wrap;
    }

    .modal-footer {
        padding: 20px 30px;
        background-color: #f8fafc;
        border-top: 1px solid #f1f5f9;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .detail-time {
        font-size: 0.85rem;
        color: #94a3b8;
        font-weight: 600;
    }

    .btn-modal-action {
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 0.9rem;
        transition: 0.2s;
    }

    .btn-reply-modal {
        background-color: #334eac;
        color: white;
    }

    .btn-reply-modal:hover {
        background-color: #1e3a8a;
    }

    .btn-delete-modal {
        background-color: white;
        color: #ef4444;
        border: 1px solid #fecaca;
    }

    .btn-delete-modal:hover {
        background-color: #fef2f2;
    }
</style>

<div class="content-area">
    <div class="top-bar">
        <div class="search-wrapper">
            <input type="text" id="searchInput" class="search-input" placeholder="Cari pesan, pengirim, atau instansi..." onkeyup="filterCards()">
            <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
        </div>
    </div>

    <div class="message-grid" id="messageGrid">
        <?php if (isset($data['pesan']) && !empty($data['pesan'])): ?>
            <?php foreach ($data['pesan'] as $pesan): ?>
                <div class="message-card">
                    <div class="card-header-flex">
                        <div class="sender-info-group">
                            <img src="https://ui-avatars.com/api/?name=<?= urlencode($pesan['nama']); ?>&background=random&color=fff&size=64" alt="Avatar" class="avatar-circle">
                            <div class="sender-text">
                                <span class="sender-name"><?= htmlspecialchars($pesan['nama']); ?></span>
                                <span class="sender-email"><?= htmlspecialchars($pesan['email']); ?></span>
                                <?php if (!empty($pesan['institution'])): ?>
                                    <span class="sender-inst"><?= htmlspecialchars($pesan['institution']); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="message-preview">
                        <?= htmlspecialchars($pesan['pesan']); ?>
                    </div>

                    <div class="card-divider"></div>

                    <div class="card-footer-flex">
                        <div class="message-date">
                            <?= date('d M Y', strtotime($pesan['waktu_kirim'])); ?>
                        </div>
                        <div class="action-group">
                            <button class="btn-detail" onclick='openDetailModal(<?= json_encode($pesan, JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_TAG | JSON_HEX_AMP); ?>)'>Lihat Detail</button>
                            <a href="<?= BASEURL; ?>/pesan/hapus/<?= $pesan['id_form']; ?>" class="btn-trash delete-btn">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="empty-state">
                <i class="far fa-folder-open fa-3x mb-3"></i><br>
                Tidak ada pesan masuk.
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="modal-overlay" id="detailModal">
    <div class="modal-container">
        <div class="modal-header">
            <div class="detail-sender">
                <img src="" alt="Avatar" id="modalAvatar" class="detail-avatar">
                <div class="detail-meta">
                    <h3 id="modalName">Nama Pengirim</h3>
                    <p id="modalEmail">email@example.com</p>
                    <span id="modalInst" class="sender-inst" style="margin-top: 5px; display: none;">Institusi</span>
                </div>
            </div>
            <button class="modal-close" onclick="closeDetailModal()">&times;</button>
        </div>

        <div class="modal-body" id="modalMessage">
            Isi pesan akan muncul di sini...
        </div>

        <div class="modal-footer">
            <div class="detail-time" id="modalTime">
                Waktu Kirim
            </div>
            <div class="action-group">
                <a href="#" id="modalDeleteBtn" class="btn-modal-action btn-delete-modal delete-btn">Hapus</a>
                <a href="#" id="modalReplyBtn" class="btn-modal-action btn-reply-modal">Balas Email</a>
            </div>
        </div>
    </div>
</div>

<script>
    const modal = document.getElementById('detailModal');
    const BASEURL = "<?= BASEURL; ?>";

    function openDetailModal(data) {
        document.getElementById('modalName').innerText = data.nama;
        document.getElementById('modalEmail').innerText = data.email;
        document.getElementById('modalMessage').innerText = data.pesan;

        const instBadge = document.getElementById('modalInst');
        if (data.institution) {
            instBadge.innerText = data.institution;
            instBadge.style.display = 'inline-block';
        } else {
            instBadge.style.display = 'none';
        }

        const avatarUrl = `https://ui-avatars.com/api/?name=${encodeURIComponent(data.nama)}&background=334eac&color=fff&size=128`;
        document.getElementById('modalAvatar').src = avatarUrl;

        const date = new Date(data.waktu_kirim);
        const options = {
            day: 'numeric',
            month: 'long',
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        };
        document.getElementById('modalTime').innerText = "Diterima: " + date.toLocaleDateString('id-ID', options);

        document.getElementById('modalReplyBtn').href = `mailto:${data.email}`;
        document.getElementById('modalDeleteBtn').href = `${BASEURL}/pesan/hapus/${data.id_form}`;

        modal.classList.add('show');
    }

    function closeDetailModal() {
        modal.classList.remove('show');
    }

    function filterCards() {
        var input, filter, grid, cards, senderName, senderEmail, messageText, instText, i;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        grid = document.getElementById("messageGrid");
        cards = grid.getElementsByClassName("message-card");

        for (i = 0; i < cards.length; i++) {
            senderName = cards[i].querySelector(".sender-name").innerText;
            senderEmail = cards[i].querySelector(".sender-email").innerText;
            messageText = cards[i].querySelector(".message-preview").innerText;

            var instElement = cards[i].querySelector(".sender-inst");
            instText = instElement ? instElement.innerText : "";

            if (senderName.toUpperCase().indexOf(filter) > -1 ||
                senderEmail.toUpperCase().indexOf(filter) > -1 ||
                messageText.toUpperCase().indexOf(filter) > -1 ||
                instText.toUpperCase().indexOf(filter) > -1) {
                cards[i].style.display = "";
            } else {
                cards[i].style.display = "none";
            }
        }
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            closeDetailModal();
        }
    }
</script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>