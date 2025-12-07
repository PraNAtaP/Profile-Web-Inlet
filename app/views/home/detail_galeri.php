<div class="full-gallery-section">
    <div class="container">
        <a href="<?= BASEURL; ?>/#gallery" class="btn-back">
            <i class="fas fa-arrow-left"></i> Back
        </a>

        <h1 class="page-title">Detail Gallery</h1>

        <?php if (isset($data['galeri']) && !empty($data['galeri'])): ?>

            <div class="gallery-grid">
                <?php foreach ($data['galeri'] as $g): ?>
                    <div class="gallery-item" title="<?= htmlspecialchars($g['judul']); ?>">
                        <a href="<?= BASEURL; ?>/img/galeri/<?= htmlspecialchars($g['foto']); ?>" target="_blank">
                            <img src="<?= BASEURL; ?>/img/galeri/<?= htmlspecialchars($g['foto']); ?>"
                                alt="<?= htmlspecialchars($g['judul']); ?>"
                                loading="lazy">
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>

        <?php else: ?>
            <div class="alert alert-warning text-center" role="alert" style="border-radius: 20px; padding: 50px;">
                <h4 class="alert-heading">Oops!</h4>
                <p>Belum ada foto di galeri ini.</p>
            </div>
        <?php endif; ?>
    </div>
</div>