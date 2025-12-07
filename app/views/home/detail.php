    <div class="detail-container">
        <?php if (isset($data['berita']) && $data['berita']): ?>
            <div class="detail-header">
                <h1><?= htmlspecialchars($data['berita']['judul']); ?></h1>
            </div>
            <div class="detail-meta">
                <span>Diterbitkan pada: <?= date('d F Y', strtotime($data['berita']['tanggal_publikasi'])); ?></span>
            </div>

            <img class="detail-image" src="<?= BASEURL; ?>/img/berita/<?= htmlspecialchars($data['berita']['video_embed']); ?>" alt="<?= htmlspecialchars($data['berita']['judul']); ?>">

            <div class="detail-content">
                <p><?= nl2br(htmlspecialchars($data['berita']['isi'])); ?></p>
            </div>

        <?php else: ?>
            <p>Berita tidak ditemukan.</p>
        <?php endif; ?>

        <a href="<?= BASEURL; ?>" class="btn-back">Kembali ke Home</a>
    </div>