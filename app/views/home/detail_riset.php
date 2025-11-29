<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($data['judul']); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/index.css">
    <style>
        body {
            background-color: #f4f7f6;
        }
        .detail-riset-container {
            max-width: 900px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            font-family: 'Poppins', sans-serif;
        }
        .detail-riset-header h1 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 0.5rem;
        }
        .detail-riset-meta {
            font-size: 0.9rem;
            color: #777;
            margin-bottom: 2rem;
        }
        .video-player-container {
            position: relative;
            padding-bottom: 56.25%; /* 16:9 aspect ratio */
            height: 0;
            overflow: hidden;
            max-width: 100%;
            background: #000;
            border-radius: 8px;
            margin-bottom: 2rem;
        }
        .video-player-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }
        .detail-riset-content {
            line-height: 1.8;
            color: #444;
            text-align: justify;
        }
        .btn-kembali {
            display: inline-block;
            margin-top: 2rem;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn-kembali:hover {
            background-color: #0056b3;
        }
        .navbar {
            position: static; 
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<?php
    $riset = $data['riset'];
    $youtube_url = $riset['video_embed'];
    $embed_url = '';

    // Ubah URL YouTube biasa ke URL embed
    if (strpos($youtube_url, 'watch?v=') !== false) {
        $video_id = substr($youtube_url, strpos($youtube_url, 'watch?v=') + 8);
        $embed_url = 'https://www.youtube.com/embed/' . $video_id;
    } elseif (strpos($youtube_url, 'youtu.be/') !== false) {
        $video_id = substr($youtube_url, strpos($youtube_url, 'youtu.be/') + 9);
        $embed_url = 'https://www.youtube.com/embed/' . $video_id;
    }
?>

<nav class="navbar">
    <div class="logo">
      <a href="<?= BASEURL; ?>"><img src="<?= BASEURL; ?>/img/LOGO.png" alt="Logo" class="logo-image" /></a>
    </div>
    <ul class="nav-menu">
      <li><a href="<?= BASEURL; ?>">Home</a></li>
      <li><a href="<?= BASEURL; ?>#news">Our News</a></li>
      <li><a href="<?= BASEURL; ?>#team">Our Team</a></li>
      <li><a href="<?= BASEURL; ?>#research">Research</a></li>
    </ul>
</nav>

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
                allowfullscreen></iframe>
    </div>
    <?php endif; ?>

    <div class="detail-riset-content">
        <?= nl2br(htmlspecialchars($riset['deskripsi'])); ?>
    </div>

    <a href="<?= BASEURL; ?>#research" class="btn-kembali">Kembali ke Daftar Riset</a>
</div>

</body>
</html>
