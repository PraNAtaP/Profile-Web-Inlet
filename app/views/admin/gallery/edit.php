<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Gallery Item</title>
    <link rel="stylesheet" href="/../../index.css">
</head>
<body>
    <div class="container">
        <h1>Edit Gallery Item</h1>
        <form action="/admin/crud/gallery/update/<?php echo $gallery['id_galeri']; ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="judul">Title</label>
                <input type="text" id="judul" name="judul" value="<?php echo $gallery['judul']; ?>" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Description</label>
                <textarea id="deskripsi" name="deskripsi" required><?php echo $gallery['deskripsi']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="foto">Photo (leave empty to keep current photo)</label>
                <input type="file" id="foto" name="foto">
                <img src="/../../public/uploads/<?php echo $gallery['foto']; ?>" width="100">
            </div>
            <div class="form-group">
                <label for="video_embed">Video Embed</label>
                <input type="text" id="video_embed" name="video_embed" value="<?php echo $gallery['video_embed']; ?>">
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>