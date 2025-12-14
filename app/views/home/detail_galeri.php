<style>
    .full-gallery-section {
        padding: 60px 5%;
        min-height: 100vh;
        background: transparent;
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: white;
        text-decoration: none;
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 20px;
        transition: transform 0.3s;
    }

    .btn-back:hover {
        transform: translateX(-5px);
        color: #ddd;
    }

    .page-title {
        text-align: center;
        color: white;
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 40px;
        text-transform: capitalize;
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
        gap: 30px;
    }

    .gallery-item {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease;
        width: 100%;
        aspect-ratio: 16 / 9;
        position: relative;
        cursor: pointer;
    }

    .gallery-item:hover {
        transform: scale(1.03);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
        z-index: 2;
    }

    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transition: transform 0.5s;
    }

    @media (max-width: 768px) {
        .gallery-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
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