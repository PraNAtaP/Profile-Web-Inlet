<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($data['judul']); ?></title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/index.css">
    <style>
        body {
            background-color: #f4f7f6;
        }
        .detail-container {
            max-width: 900px;
            margin: 2rem auto;
            padding: 2rem;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .detail-header h1 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 0.5rem;
        }
        .detail-meta {
            font-size: 0.9rem;
            color: #777;
            margin-bottom: 1.5rem;
        }
        .detail-image {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 2rem;
        }
        .detail-content {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #444;
            white-space: pre-wrap; /* Agar format paragraf dari textarea terjaga */
        }
        .btn-back {
            display: inline-block;
            margin-top: 2rem;
            padding: 0.8rem 1.5rem;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn-back:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

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

</body>
</html>
