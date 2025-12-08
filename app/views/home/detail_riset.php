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