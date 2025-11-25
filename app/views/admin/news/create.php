<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add News Item</title>
    <link rel="stylesheet" href="/../../index.css">
</head>
<body>
    <div class="container">
        <h1>Add News Item</h1>
        <form action="/admin/crud/news/store" method="POST">
            <div class="form-group">
                <label for="judul">Title</label>
                <input type="text" id="judul" name="judul" required>
            </div>
            <div class="form-group">
                <label for="isi">Content</label>
                <textarea id="isi" name="isi" required></textarea>
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