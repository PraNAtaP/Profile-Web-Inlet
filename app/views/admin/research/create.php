<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Research</title>
    <link rel="stylesheet" href="/../../index.css">
</head>
<body>
    <div class="container">
        <h1>Add Research</h1>
        <form action="/admin/crud/research/store" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="judul_riset">Title</label>
                <input type="text" id="judul_riset" name="judul_riset" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Description</label>
                <textarea id="deskripsi" name="deskripsi" required></textarea>
            </div>
            <div class="form-group">
                <label for="peneliti">Researcher</label>
                <input type="text" id="peneliti" name="peneliti" required>
            </div>
            <div class="form-group">
                <label for="tanggal_publikasi">Publication Date</label>
                <input type="date" id="tanggal_publikasi" name="tanggal_publikasi" required>
            </div>
            <div class="form-group">
                <label for="file_dokumen">Document</label>
                <input type="file" id="file_dokumen" name="file_dokumen" required>
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