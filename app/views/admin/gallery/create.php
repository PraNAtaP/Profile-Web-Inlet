<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Gallery Item</title>
    <link rel="stylesheet" href="/../../index.css">
</head>
<body>
    <div class="container">
        <h1>Add Gallery Item</h1>
        <form action="/admin/crud/gallery/store" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="judul">Title</label>
                <input type="text" id="judul" name="judul" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Description</label>
                <textarea id="deskripsi" name="deskripsi" required></textarea>
            </div>
            <div class="form-group">
                <label for="foto">Photo</label>
                <input type="file" id="foto" name="foto" required>
            </div>
            <div class="form-group">
                <label for="video_embed">Video Embed</label>
                <input type="text" id="video_embed" name="video_embed">
            </div>
            <button type="submit">Save</button>
        </form>
    </div>
</body>
</html>