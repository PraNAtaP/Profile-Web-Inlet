<style>
    .detail-riset-section {
        padding: 120px 5% 80px;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .detail-riset-container {
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

    .detail-riset-header {
        text-align: center;
        margin-bottom: 30px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        padding-bottom: 20px;
    }

    .detail-riset-header h1 {
        font-size: 2.2rem;
        margin-bottom: 10px;
        color: #ffffffff;
        font-weight: 800;
        text-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        line-height: 1.3;
    }

    .detail-riset-meta {
        font-size: 0.95rem;
        color: #a4c2f4;
        font-weight: 500;
    }

    .video-player-container {
        position: relative;
        padding-bottom: 56.25%;
        height: 0;
        overflow: hidden;
        border-radius: 20px;
        margin-bottom: 30px;
        border: 4px solid rgba(255, 255, 255, 0.15);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    }

    .video-player-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .detail-riset-content {
        font-size: 1.1rem;
        line-height: 1.8;
        margin-bottom: 40px;
        text-align: justify;
        opacity: 0.95;
    }

    .btn-kembali {
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

    .btn-kembali:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(30, 60, 114, 0.4);
        background: linear-gradient(90deg, #2a5298 0%, #1e3c72 100%);
    }

    @media (max-width: 768px) {
        .detail-riset-section {
            padding: 100px 5%;
        }

        .detail-riset-container {
            padding: 30px;
        }

        .detail-riset-header h1 {
            font-size: 1.8rem;
        }
    }
</style>

<?php
$riset = $data['riset'];
$youtube_url = $riset['video_embed'];
$embed_url = '';
if (strpos($youtube_url, 'watch?v=') !== false) {
    $video_id = substr($youtube_url, strpos($youtube_url, 'watch?v=') + 8);
    $embed_url = 'https://www.youtube.com/embed/' . $video_id;
} elseif (strpos($youtube_url, 'youtu.be/') !== false) {
    $video_id = substr($youtube_url, strpos($youtube_url, 'youtu.be/') + 9);
    $embed_url = 'https://www.youtube.com/embed/' . $video_id;
}
?>

<section class="detail-riset-section">
    <div class="detail-riset-container">
        <div class="detail-riset-header">
            <h1><?= htmlspecialchars($riset['judul_riset']); ?></h1>
            <div class="detail-riset-meta">
                <span>Oleh: <?= htmlspecialchars($riset['peneliti']); ?></span> |
                <span>Tanggal Publikasi: <?= date('d M Y', strtotime($riset['tanggal_publikasi'])); ?></span>
            </div>
        </div>

        <?php if ($embed_url): ?>
            <div class="video-player-container">
                <iframe src="<?= $embed_url; ?>"
                    title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
        <?php endif; ?>

        <div class="detail-riset-content">
            <?= nl2br(htmlspecialchars($riset['deskripsi'])); ?>
        </div>

        <a href="<?= BASEURL; ?>#research" class="btn-kembali">Kembali ke Daftar Riset</a>
    </div>
</section>