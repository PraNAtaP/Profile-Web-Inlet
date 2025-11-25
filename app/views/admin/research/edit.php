<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Research</title>
    <link rel="stylesheet" href="/../../index.css">
</head>
<body>
    <div class="container">
        <h1>Edit Research</h1>
        <form action="/admin/crud/research/update/<?php echo $research['id_riset']; ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="judul_riset">Title</label>
                <input type="text" id="judul_riset" name="judul_riset" value="<?php echo $research['judul_riset']; ?>" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Description</label>
                <textarea id="deskripsi" name="deskripsi" required><?php echo $research['deskripsi']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="peneliti">Researcher</label>
                <input type="text" id="peneliti" name="peneliti" value="<?php echo $research['peneliti']; ?>" required>
            </div>
            <div class="form-group">
                <label for="tanggal_publikasi">Publication Date</label>
                <input type="date" id="tanggal_publikasi" name="tanggal_publikasi" value="<?php echo $research['tanggal_publikasi']; ?>" required>
            </div>
            <div class="form-group">
                <label for="file_dokumen">Document (leave empty to keep current document)</label>
                <input type="file" id="file_dokumen" name="file_dokumen">
                <a href="/../../public/uploads/<?php echo $research['file_dokumen']; ?>" target="_blank">View Current Document</a>
            </div>
            <div class="form-group">
                <label for="video_embed">Video Embed</label>
                <input type="text" id="video_embed" name="video_embed" value="<?php echo $research['video_embed']; ?>">
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>