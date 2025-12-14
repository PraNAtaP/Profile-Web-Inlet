<style>
    .detail-berita-section {
        padding: 120px 5% 80px;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .detail-container {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border-radius: 30px;
        padding: 50px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
        width: 100%;
        max-width: 900px;
        position: relative;
        overflow: hidden;
        color: white;
    }

    .detail-header {
        text-align: center;
        margin-bottom: 10px;
    }

    .detail-header h1 {
        font-size: 2.5rem;
        color: #ffffffff;
        font-weight: 800;
        text-transform: capitalize;
        text-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        line-height: 1.2;
    }

    .detail-meta {
        text-align: center;
        font-size: 0.95rem;
        color: #a4c2f4;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        font-weight: 500;
    }

    .detail-image {
        width: 100%;
        max-height: 500px;
        object-fit: cover;
        border-radius: 20px;
        margin-bottom: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        border: 4px solid rgba(255, 255, 255, 0.15);
    }

    .detail-content {
        font-size: 1.1rem;
        line-height: 1.8;
        color: rgba(255, 255, 255, 0.95);
        text-align: justify;
        margin-bottom: 40px;
    }

    .btn-back {
        display: inline-flex;
        padding: 12px 30px;
        background: linear-gradient(90deg, #1e3c72 0%, #2a5298 100%);
        color: white;
        text-decoration: none;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .btn-back:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(30, 60, 114, 0.4);
        background: linear-gradient(90deg, #2a5298 0%, #1e3c72 100%);
    }

    @media (max-width: 768px) {
        .detail-berita-section {
            padding: 100px 5%;
        }

        .detail-container {
            padding: 30px;
        }

        .detail-header h1 {
            font-size: 1.8rem;
        }
    }
</style>

<section class="detail-berita-section">
    <div class="detail-container">
        <?php if (isset($data['berita']) && $data['berita']): ?>
            <div class="detail-header">
                <h1><?= htmlspecialchars($data['berita']['judul']); ?></h1>
            </div>
            <div class="detail-meta">
                <span>Diterbitkan pada: <?= date('d F Y', strtotime($data['berita']['tanggal_publikasi'])); ?></span>
            </div>

            <img class="detail-image" src="<?= BASEURL; ?>/img/berita/<?= htmlspecialchars($data['berita']['gambar']); ?>" alt="<?= htmlspecialchars($data['berita']['judul']); ?>">

            <div class="detail-content">
                <p><?= nl2br(htmlspecialchars($data['berita']['isi'])); ?></p>
            </div>
        <?php else: ?>
            <p style="text-align:center; margin-bottom: 30px;">Berita tidak ditemukan.</p>
        <?php endif; ?>

        <a href="<?= BASEURL; ?>#news" class="btn-back">Kembali ke Home</a>
    </div>
</section>